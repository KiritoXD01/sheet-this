import { Testimonial } from '@/Components/Auth/Testimonial';
import { Checkbox } from '@/Components/Form/Checkbox';
import { PasswordToggle } from '@/Components/Form/PasswordToggle';
import { TextInput } from '@/Components/Form/TextInput';
import AuthLayout from '@/Layouts/AuthLayout';
import { store } from '@/routes/login';
import { request as forgotPassword } from '@/routes/password';
import { index as register } from '@/routes/register';
import { PageProps } from '@/types';
import { Form, Link, usePage } from '@inertiajs/react';
import { AlertCircle, CheckCircle2, Lock, Mail } from 'lucide-react';
import { useState } from 'react';

const STATS = [
    { value: '12K+', label: 'Freelancers' },
    { value: '2.4M', label: 'Hours Tracked' },
    { value: '98%', label: 'Uptime' },
];

export default function Login() {
    const { flash } = usePage<PageProps>().props;
    const [showPassword, setShowPassword] = useState(false);

    const hero = (
        <>
            <div className="flex flex-col gap-4">
                <h1 className="text-white font-inter font-bold text-5xl leading-tight">
                    Track time.<br />Ship faster.
                </h1>
                <p className="text-brand-muted font-inter text-base leading-relaxed max-w-md">
                    The time tracking tool built for freelancers who value precision and simplicity.
                </p>
            </div>
            <div className="flex gap-8">
                {STATS.map((stat) => (
                    <div key={stat.label} className="flex flex-col gap-1">
                        <span className="text-accent-light font-jetbrains font-bold text-3xl">{stat.value}</span>
                        <span className="text-brand-muted text-[11px] font-inter font-semibold tracking-widest uppercase">{stat.label}</span>
                    </div>
                ))}
            </div>
        </>
    );

    const aside = (
        <Testimonial
            quote="“SheetThis replaced three tools for me. I track hours, invoice clients, and see where my time actually goes — all in one place.”"
            name="Maya Torres"
            role="UX Designer, Freelance"
            avatarClassName="bg-purple-400"
        />
    );

    return (
        <AuthLayout hero={hero} aside={aside}>
            <Form className="flex flex-col gap-8" action={store()} method="post" autoComplete="off">
                {({ errors, processing }) => (
                    <>
                        <div className="flex flex-col gap-2">
                            <h2 className="text-gray-900 font-inter font-bold text-[28px]">Welcome back</h2>
                            <p className="text-gray-500 font-inter text-sm">Sign in to your account to continue tracking</p>
                        </div>

                        {flash.status && (
                            <div className="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-3">
                                <CheckCircle2 className="w-5 h-5 text-emerald-500 shrink-0" />
                                <p className="text-emerald-700 font-inter text-sm">{flash.status}</p>
                            </div>
                        )}

                        {flash.message && (
                            <div className="flex items-center gap-2.5 bg-red-50 border border-red-200 rounded-lg px-4 py-3">
                                <AlertCircle className="w-5 h-5 text-red-500 shrink-0" />
                                <p className="text-red-700 font-inter text-sm">{flash.message}</p>
                            </div>
                        )}

                        <div className="flex flex-col gap-5">
                            <TextInput
                                id="email"
                                name="email"
                                type="email"
                                label="Email"
                                icon={Mail}
                                placeholder="you@email.com"
                                required
                                maxLength={191}
                                error={errors.email}
                            />

                            <TextInput
                                id="password"
                                name="password"
                                type={showPassword ? 'text' : 'password'}
                                label="Password"
                                icon={Lock}
                                placeholder="••••••••••"
                                required
                                error={errors.password}
                                trailing={<PasswordToggle visible={showPassword} onToggle={() => setShowPassword((v) => !v)} />}
                            />

                            <div className="flex items-center justify-between">
                                <Checkbox id="remember" name="remember" value="1" label="Remember me" />
                                <Link href={forgotPassword()} className="text-gray-900 font-inter text-[13px] font-medium hover:underline">
                                    Forgot password?
                                </Link>
                            </div>
                        </div>

                        <button
                            type="submit"
                            disabled={processing}
                            className="w-full bg-accent hover:bg-accent/90 disabled:opacity-60 transition-colors text-white font-inter font-semibold text-[15px] py-3.5 rounded-lg cursor-pointer"
                        >
                            {processing ? 'Signing in…' : 'Sign In'}
                        </button>

                        <div className="flex justify-center gap-1.5">
                            <span className="text-gray-400 font-inter text-[13px]">Don't have an account?</span>
                            <Link href={register()} className="text-accent font-inter text-[13px] font-semibold hover:underline">
                                Create one
                            </Link>
                        </div>
                    </>
                )}
            </Form>
        </AuthLayout>
    );
}
