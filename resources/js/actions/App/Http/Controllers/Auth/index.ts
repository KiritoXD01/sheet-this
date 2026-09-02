import LoginController from './LoginController'
import RegisterController from './RegisterController'
import PasswordResetLinkController from './PasswordResetLinkController'
import NewPasswordController from './NewPasswordController'

const Auth = {
    LoginController: Object.assign(LoginController, LoginController),
    RegisterController: Object.assign(RegisterController, RegisterController),
    PasswordResetLinkController: Object.assign(PasswordResetLinkController, PasswordResetLinkController),
    NewPasswordController: Object.assign(NewPasswordController, NewPasswordController),
}

export default Auth