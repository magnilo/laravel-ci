@servers(['web' => 'deployer@20.205.28.51'])

@sshKey('/home/quincy/.ssh/deployer_key')

@setup
    $repository = 'ssh://git@20.205.28.51:2222/pawanghujan/laravel-ci.git';
    $releases_dir = '/var/www/laravel-ci/releases';
    $app_dir = '/var/www/laravel-ci';
    $release = date('YmdHis');
    $new_release_dir = $releases_dir . '/' . $release;
@endsetup

@story('deploy')
    prepare_directories
    clone_repository
    run_composer
    update_symlinks
@endstory

@task('prepare_directories')
    mkdir -p {{ $releases_dir }}
    mkdir -p {{ $app_dir }}/shared
@endtask

@task('clone_repository')
    mkdir -p {{ $new_release_dir }}
    git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
@endtask

@task('run_composer')
    cd {{ $new_release_dir }}
    composer install --no-interaction --prefer-dist --optimize-autoloader
@endtask

@task('update_symlinks')
    if [ -L {{ $app_dir }}/current ] || [ -d {{ $app_dir }}/current ]; then
        rm -rf {{ $app_dir }}/current
    fi
    ln -s {{ $new_release_dir }} {{ $app_dir }}/current
@endtask
