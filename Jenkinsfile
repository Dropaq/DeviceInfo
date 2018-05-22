pipeline {
  agent any
  stages {
    stage('error') {
      steps {
        git(url: 'https://github.com/Dropaq/DeviceInfo.git', credentialsId: 'github')
      }
    }
  }
}