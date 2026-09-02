import Auth from './Auth'
import ProjectController from './ProjectController'

const Controllers = {
    Auth: Object.assign(Auth, Auth),
    ProjectController: Object.assign(ProjectController, ProjectController),
}

export default Controllers