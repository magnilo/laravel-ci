pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    if (isUnix()) {
                        sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
                        sh 'npm install'
                    } else {
                        bat 'composer install --no-interaction --prefer-dist --optimize-autoloader'
                        bat 'npm install'
                    }
                }
            }
        }

        stage('Test') {
            steps {
                script {
                    if (isUnix()) {
                        sh 'php artisan test'
                    } else {
                        bat 'php artisan test'
                    }
                }
            }
        }

        stage('Build Assets') {
            steps {
                script {
                    if (isUnix()) {
                        sh 'npm run production'
                    } else {
                        bat 'npm run production'
                    }
                }
            }
        }
    }

    post {
        always {
            archiveArtifacts artifacts: 'public/css/**, public/js/**, public/mix-manifest.json', allowEmptyArchive: true
        }
    }
}