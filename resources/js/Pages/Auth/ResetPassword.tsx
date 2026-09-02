import { ResetHero } from '@/Components/Auth/ResetHero';
import { Testimonial } from '@/Components/Auth/Testimonial';
import { PasswordToggle } from '@/Components/Form/PasswordToggle';
import { TextInput } from '@/Components/Form/TextInput';
import AuthLayout from '@/Layouts/AuthLayout';
import { index as login } from '@/routes/login';
import { update as resetPassword } from '@/routes/password';
import { Form, Link } from '@inertiajs/react';
import { ArrowLeft, Lock, Mail } from 'lucide-react';
import { useState } from 'react';

interface Props {
    token: string;
    email: string;
}

const aside = (
    <Testimonial
        quote="“Account recovery was painless — got the reset link in seconds and was back tracking my hours immediately.”"
        name="Daniel Kim"
        role="Full-Stack Developer"
    />
);

export default function ResetPassword({ token, email }: Props) {
    const [showPassword, setShowPassword] = useState(false);
    const [showConfirm, setShowConfirm] = useState(false);

    return (
        <AuthLayout hero={<ResetHero />} aside={aside}>
            <Form className="flex flex-col gap-8" action={resetPassword()} method="post">
                {({ errors, processing }) => (
                    <>
                        <div className="flex flex-col gap-2">
                            <h2 className="text-gray-900 font-inter font-bold text-[28px]">Choose a new password</h2>
                            <p className="text-gray-500 font-inter text-sm leading-relaxed">
                                Pick something strong — at least 8 characters.
                            </p>
                        </div>

                        <input type="hidden" name="token" value={token} />

                        <div className="flex flex-col gap-5">
                            <TextInput
                                id="email"
                                name="email"
                                type="email"
                                label="Email Address"
                                icon={Mail}
                                defaultValue={email}
                                placeholder="you@email.com"
                                required
                                maxLength={191}
                                autoComplete="email"
                                error={errors.email}
                            />

                            <TextInput
                                id="password"
                                name="password"
                                type={showPassword ? 'text' : 'password'}
                                label="New Password"
                                icon={Lock}
                                placeholder="Min. 8 characters"
                                required
                                autoComplete="new-password"
                                error={errors.password}
                                trailing={<PasswordToggle visible={showPassword} onToggle={() => setShowPassword((v) => !v)} />}
                            />

                            <TextInput
                                id="password_confirmation"
                                name="password_confirmation"
                                type={showConfirm ? 'text' : 'password'}
                                label="Confirm Password"
                                icon={Lock}
                                placeholder="••••••••••"
                                required
                                autoComplete="new-password"
                                error={errors.password_confirmation}
                                trailing={<PasswordToggle visible={showConfirm} onToggle={() => setShowConfirm((v) => !v)} />}
                            />

                            <button
                                type="submit"
                                disabled={processing}
                                className="w-full bg-accent hover:bg-accent/90 disabled:opacity-60 transition-colors text-white font-inter font-semibold text-[15px] py-3.5 rounded-lg cursor-pointer"
                            >
                                {processing ? 'Resetting…' : 'Reset Password'}
                            </button>
                        </div>

                        <div className="flex justify-center">
                            <Link href={login()} className="flex items-center gap-1.5 text-accent font-inter text-[13px] font-medium hover:underline">
                                <ArrowLeft className="w-4 h-4" />
                                Back to Sign In
                            </Link>
                        </div>
                    </>
                )}
            </Form>
        </AuthLayout>
    );
}
