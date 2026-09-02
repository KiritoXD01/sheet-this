const STEPS = [
    { title: 'Enter email', description: 'Type the email you registered with' },
    { title: 'Check inbox', description: 'Click the secure reset link we send you' },
    { title: 'New password', description: 'Set a new password and get back to work' },
];

/** Brand-panel hero shared by the Forgot Password and Reset Password pages. */
export function ResetHero() {
    return (
        <>
            <div className="flex flex-col gap-4">
                <h1 className="text-white font-inter font-bold text-5xl leading-tight">
                    Don't worry,<br />we've got you.
                </h1>
                <p className="text-brand-muted font-inter text-base leading-relaxed max-w-md">
                    We'll send a secure link to your email so you can reset your password in seconds.
                </p>
            </div>
            <div className="flex gap-6">
                {STEPS.map((step, index) => (
                    <div key={step.title} className="flex-1 flex flex-col gap-2">
                        <div className="w-9 h-9 bg-accent rounded-full flex items-center justify-center">
                            <span className="text-white font-jetbrains font-bold text-sm">{index + 1}</span>
                        </div>
                        <span className="text-white font-inter font-semibold text-sm">{step.title}</span>
                        <span className="text-brand-muted font-inter text-xs leading-relaxed">{step.description}</span>
                    </div>
                ))}
            </div>
        </>
    );
}
