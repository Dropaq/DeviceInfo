pipeline {
  agent any
  stages {
    stage('error') {
      steps {
        git(url: 'git@github.com:Dropaq/DeviceInfo.git', credentialsId: 'github')
      }
    }
  }
}