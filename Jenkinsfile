pipeline {
    agent any 
    stages {
            stage('Unit Tests and Code Coverage') {
            steps {
                echo 'starting jenkins run...' 
            }
            post {
                always {
                    publishTestResult type:'unittest', fileLocation: './testng.json'
                }
            }
        }
        stages {
            stage('metrics') {
            steps {
                echo 'starting jenkins metrics run...' 
            }
            post {
                always {
                    UploadMetricsFile name: 'cucumber3', fileLocation: './testng.json'
                }
            }
        }
    }
}
