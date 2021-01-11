pipeline {
    agent any 
    stages {
            stage('Unit Test and Code Coverage Draft PR') {
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
                echo 'starting jenkins metrics run  Draft PR...' 
            }
            post {
                always {
                    UploadMetricsFile name: 'cucumber3', fileLocation: './testng.json'
                }
            }
        }
    }
}
