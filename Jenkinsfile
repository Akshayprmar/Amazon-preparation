pipeline {
    agent any 
    stages {
                stage('Unit Test and Code Coverage') {
            steps {
                echo 'starting jenkins run...' 
            }
            // post build section to use "publishTestResult" method to publish test result
            post {
                always {
                    publishTestResult type:'unittest', fileLocation: './mochatest.json'
                    publishTestResult type:'code', fileLocation: './tests/coverage/reports/coverage-summary.json'
                }
            }
        }
    }
}
