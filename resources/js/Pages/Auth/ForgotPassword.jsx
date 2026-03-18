import { Link } from '@inertiajs/react';
import { Timer, Mail, ArrowLeft } from 'lucide-react';

export default function ForgotPassword() {
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
                            Don't worry,<br />we've got you.
                        </h1>
                        <p className="text-[#A5B4FC] font-inter text-base leading-relaxed max-w-md">
                            We'll send a secure link to your email so you can reset your password in seconds.
                        </p>
                    </div>

                    {/* Steps */}
                    <div className="flex gap-6">
                        {/* Step 1 */}
                        <div className="flex-1 flex flex-col gap-2">
                            <div className="w-9 h-9 bg-violet-500 rounded-full flex items-center justify-center">
                                <span className="text-white font-jetbrains font-bold text-sm">1</span>
                            </div>
                            <span className="text-white font-inter font-semibold text-sm">Enter email</span>
                            <span className="text-[#A5B4FC] font-inter text-xs leading-relaxed">Type the email you registered with</span>
                        </div>

                        {/* Step 2 */}
                        <div className="flex-1 flex flex-col gap-2">
                            <div className="w-9 h-9 bg-violet-500 rounded-full flex items-center justify-center">
                                <span className="text-white font-jetbrains font-bold text-sm">2</span>
                            </div>
                            <span className="text-white font-inter font-semibold text-sm">Check inbox</span>
                            <span className="text-[#A5B4FC] font-inter text-xs leading-relaxed">Click the secure reset link we send you</span>
                        </div>

                        {/* Step 3 */}
                        <div className="flex-1 flex flex-col gap-2">
                            <div className="w-9 h-9 bg-violet-500 rounded-full flex items-center justify-center">
                                <span className="text-white font-jetbrains font-bold text-sm">3</span>
                            </div>
                            <span className="text-white font-inter font-semibold text-sm">New password</span>
                            <span className="text-[#A5B4FC] font-inter text-xs leading-relaxed">Set a new password and get back to work</span>
                        </div>
                    </div>
                </div>

                {/* Testimonial */}
                <div className="bg-[#2D2A5E] rounded-xl p-6 flex flex-col gap-3">
                    <p className="text-[#A5B4FC] font-inter text-sm italic leading-relaxed">
                        "Account recovery was painless — got the reset link in seconds and was back tracking my hours immediately."
                    </p>
                    <div className="flex items-center gap-2.5">
                        <div className="w-8 h-8 rounded-full bg-violet-400"></div>
                        <div className="flex flex-col gap-0.5">
                            <span className="text-white font-inter font-semibold text-[13px]">Daniel Kim</span>
                            <span className="text-[#A09ABF] text-xs font-inter">Full-Stack Developer</span>
                        </div>
                    </div>
                </div>
            </div>

            {/* Form Panel */}
            <div className="w-[540px] bg-white p-16 flex items-center justify-center">
                <div className="w-full max-w-sm flex flex-col gap-8">
                    {/* Form Header */}
                    <div className="flex flex-col gap-2">
                        <h2 className="text-gray-900 font-inter font-bold text-[28px]">Reset your password</h2>
                        <p className="text-gray-600 font-inter text-sm leading-relaxed">
                            Enter your email address and we'll send you a link to reset your password.
                        </p>
                    </div>

                    {/* Form Fields */}
                    <div className="flex flex-col gap-5">
                        {/* Email Field */}
                        <div className="flex flex-col gap-1.5">
                            <label className="text-gray-500 text-[11px] font-inter font-semibold tracking-widest uppercase">Email Address</label>
                            <div className="flex items-center gap-2.5 bg-[#F8F7FC] border border-gray-200 rounded-lg px-4 py-3">
                                <Mail className="w-4 h-4 text-gray-400" />
                                <span className="text-gray-400 font-inter text-sm">you@email.com</span>
                            </div>
                        </div>

                        {/* Submit Button */}
                        <button className="w-full bg-violet-600 hover:bg-violet-700 transition-colors text-white font-inter font-semibold text-[15px] py-3.5 rounded-lg">
                            Send Reset Link
                        </button>
                    </div>

                    {/* Back Link */}
                    <div className="flex justify-center">
                        <Link href="/login" className="flex items-center gap-1.5 text-violet-600 font-inter text-[13px] font-medium hover:underline">
                            <ArrowLeft className="w-4 h-4" />
                            Back to Sign In
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    );
}
