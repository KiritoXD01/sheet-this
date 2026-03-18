import { store } from '@/actions/App/Http/Controllers/Auth/LoginController';
import { Form, Link, usePage } from '@inertiajs/react';
import { Timer, Mail, Lock, EyeOff, AlertCircle } from 'lucide-react';

export default function Login() {
    const { props } = usePage();
    const errorMessage = (props.flash as { message?: string })?.message;

    return (
        <div className="flex min-h-screen">
            {/* Brand Panel */}
            <div className="flex-1 bg-violet-600 p-16 flex flex-col justify-between">
                {/* Top Section */}
                <div className="flex flex-col gap-12">
                    {/* Logo */}
                    <div className="flex items-center gap-2.5">
                        <div className="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <Timer className="w-5 h-5 text-violet-600" />
                        </div>
                        <span className="text-white font-jetbrains font-bold text-2xl">SheetThis</span>
                    </div>

                    {/* Hero Text */}
                    <div className="flex flex-col gap-4">
                        <h1 className="text-white font-inter font-bold text-5xl leading-tight">
                            Track time.<br />Ship faster.
                        </h1>
                        <p className="text-[#C4BFE0] font-inter text-base leading-relaxed max-w-md">
                            The time tracking tool built for freelancers who value precision and simplicity.
                        </p>
                    </div>

                    {/* Stats Row */}
                    <div className="flex gap-8">
                        <div className="flex flex-col gap-1">
                            <span className="text-[#EDE9FE] font-jetbrains font-bold text-3xl">12K+</span>
                            <span className="text-[#A09ABF] text-[11px] font-inter font-semibold tracking-widest uppercase">Freelancers</span>
                        </div>
                        <div className="flex flex-col gap-1">
                            <span className="text-[#EDE9FE] font-jetbrains font-bold text-3xl">2.4M</span>
                            <span className="text-[#A09ABF] text-[11px] font-inter font-semibold tracking-widest uppercase">Hours Tracked</span>
                        </div>
                        <div className="flex flex-col gap-1">
                            <span className="text-[#EDE9FE] font-jetbrains font-bold text-3xl">98%</span>
                            <span className="text-[#A09ABF] text-[11px] font-inter font-semibold tracking-widest uppercase">Uptime</span>
                        </div>
                    </div>
                </div>

                {/* Testimonial */}
                <div className="bg-[#2D2A5E] rounded-xl p-6 flex flex-col gap-3">
                    <p className="text-[#C4BFE0] font-inter text-sm italic leading-relaxed">
                        "SheetThis replaced three tools for me. I track hours, invoice clients, and see where my time actually goes — all in one place."
                    </p>
                    <div className="flex items-center gap-2.5">
                        <div className="w-8 h-8 rounded-full bg-purple-400"></div>
                        <div className="flex flex-col gap-0.5">
                            <span className="text-white font-inter font-semibold text-[13px]">Maya Torres</span>
                            <span className="text-[#A09ABF] text-xs font-inter">UX Designer, Freelance</span>
                        </div>
                    </div>
                </div>
            </div>

            {/* Form Panel */}
            <div className="w-[540px] bg-white p-16 flex items-center justify-center">
                <Form className="w-full max-w-sm flex flex-col gap-8" action={store()} method="post" autoComplete='off'>
                    {/* Form Header */}
                    <div className="flex flex-col gap-2">
                        <h2 className="text-gray-900 font-inter font-bold text-[28px]">Welcome back</h2>
                        <p className="text-gray-700 font-inter text-sm">Sign in to your account to continue tracking</p>
                    </div>

                    {/* Error Message */}
                    {errorMessage && (
                        <div className="flex items-center gap-2.5 bg-red-50 border border-red-200 rounded-lg px-4 py-3">
                            <AlertCircle className="w-5 h-5 text-red-500 flex-shrink-0" />
                            <p className="text-red-700 font-inter text-sm">{errorMessage}</p>
                        </div>
                    )}

                    {/* Form Fields */}
                    <div className="flex flex-col gap-5">
                        {/* Email Field */}
                        <div className="flex flex-col gap-1.5">
                            <label className="text-gray-900 text-[11px] font-inter font-semibold tracking-widest uppercase" htmlFor="email">Email</label>
                            <div className="flex items-center gap-2.5 bg-[#F8F7FC] border border-gray-200 rounded-lg px-4 py-3">
                                <Mail className="w-4 h-4 text-gray-400" />
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="you@email.com"
                                    className="flex-1 bg-transparent text-gray-900 font-inter text-sm outline-none placeholder:text-gray-400"
                                    id='email'
                                    required
                                    maxLength={191}
                                />
                            </div>
                        </div>

                        {/* Password Field */}
                        <div className="flex flex-col gap-1.5">
                            <label className="text-gray-900 text-[11px] font-inter font-semibold tracking-widest uppercase" htmlFor="password">Password</label>
                            <div className="flex items-center justify-between bg-[#F8F7FC] border border-gray-200 rounded-lg px-4 py-3">
                                <div className="flex items-center gap-2.5">
                                    <Lock className="w-4 h-4 text-gray-400" />
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="••••••••••"
                                        className="flex-1 bg-transparent text-gray-900 font-inter text-sm outline-none placeholder:text-gray-400"
                                        id='password'
                                        required
                                    />
                                </div>
                                <EyeOff className="w-4 h-4 text-gray-400 cursor-pointer" />
                            </div>
                        </div>

                        {/* Remember & Forgot */}
                        <div className="flex items-center justify-between">
                            <div className="flex items-center gap-2">
                                <div className="w-[18px] h-[18px] border border-gray-300 rounded bg-[#F8F7FC]"></div>
                                <span className="text-gray-700 font-inter text-[13px]">Remember me</span>
                            </div>
                            <Link href="/forgot-password" className="text-gray-700 font-inter text-[13px] font-medium hover:underline">
                                Forgot password?
                            </Link>
                        </div>
                    </div>

                    {/* Actions */}
                    <div className="flex flex-col gap-5">
                        <button type="submit" className="w-full bg-violet-600 hover:bg-violet-700 transition-colors text-white font-inter font-semibold text-[15px] py-3.5 rounded-lg cursor-pointer">
                            Sign In
                        </button>
                    </div>

                    {/* Sign Up Link */}
                    <div className="flex justify-center gap-1.5">
                        <span className="text-gray-700 font-inter text-[13px]">Don't have an account?</span>
                        <Link href="/register" className="text-gray-900 font-inter text-[13px] font-semibold hover:underline">
                            Create one
                        </Link>
                    </div>
                </Form>
            </div>
        </div>
    );
}
