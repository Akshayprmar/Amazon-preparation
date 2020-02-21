pipeline {
    agent any 
    stages {
            stage('Unit Test and Code Coverage') {
            steps {
                echo 'starting jenkins run...' 
            }
            post {
                always {
                    publishTestResult type:'unittest', fileLocation: './testng.json'
                }
            }
        }
    }
}
