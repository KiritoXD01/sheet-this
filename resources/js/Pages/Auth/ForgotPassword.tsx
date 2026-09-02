import { ResetHero } from '@/Components/Auth/ResetHero';
import { Testimonial } from '@/Components/Auth/Testimonial';
import { TextInput } from '@/Components/Form/TextInput';
import AuthLayout from '@/Layouts/AuthLayout';
import { index as login } from '@/routes/login';
import { email as sendResetLink } from '@/routes/password';
import { PageProps } from '@/types';
import { Form, Link, usePage } from '@inertiajs/react';
import { ArrowLeft, CheckCircle2, Mail } from 'lucide-react';

const aside = (
    <Testimonial
        quote="“Account recovery was painless — got the reset link in seconds and was back tracking my hours immediately.”"
        name="Daniel Kim"
        role="Full-Stack Developer"
    />
);

export default function ForgotPassword() {
    const { flash } = usePage<PageProps>().props;

    return (
        <AuthLayout hero={<ResetHero />} aside={aside}>
            <Form className="flex flex-col gap-8" action={sendResetLink()} method="post">
                {({ errors, processing }) => (
                    <>
                        <div className="flex flex-col gap-2">
                            <h2 className="text-gray-900 font-inter font-bold text-[28px]">Reset your password</h2>
                            <p className="text-gray-500 font-inter text-sm leading-relaxed">
                                Enter your email address and we'll send you a link to reset your password.
                            </p>
                        </div>

                        {flash.status && (
                            <div className="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-3">
                                <CheckCircle2 className="w-5 h-5 text-emerald-500 shrink-0" />
                                <p className="text-emerald-700 font-inter text-sm">{flash.status}</p>
                            </div>
                        )}

                        <div className="flex flex-col gap-5">
                            <TextInput
                                id="email"
                                name="email"
                                type="email"
                                label="Email Address"
                                icon={Mail}
                                placeholder="you@email.com"
                                required
                                maxLength={191}
                                autoComplete="email"
                                error={errors.email}
                            />

                            <button
                                type="submit"
                                disabled={processing}
                                className="w-full bg-accent hover:bg-accent/90 disabled:opacity-60 transition-colors text-white font-inter font-semibold text-[15px] py-3.5 rounded-lg cursor-pointer"
                            >
                                {processing ? 'Sending…' : 'Send Reset Link'}
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
