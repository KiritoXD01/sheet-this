import { Timer } from 'lucide-react';
import { ReactNode } from 'react';

interface Props {
    /** Content shown under the logo in the brand panel (headline, subline, stats…). */
    hero: ReactNode;
    /** Content pinned to the bottom of the brand panel (testimonial). */
    aside?: ReactNode;
    /** Vertical padding class for the form panel; Register uses a tighter one. */
    formPaddingClassName?: string;
    children: ReactNode;
}

export default function AuthLayout({ hero, aside, formPaddingClassName = 'py-16', children }: Props) {
    return (
        <div className="flex min-h-screen bg-white">
            {/* Brand Panel */}
            <div className="hidden lg:flex flex-1 bg-accent-dark p-16 flex-col justify-between">
                <div className="flex flex-col gap-12">
                    <div className="flex items-center gap-2.5">
                        <Timer className="w-6 h-6 text-accent" />
                        <span className="text-white font-jetbrains font-bold text-2xl">SheetThis</span>
                    </div>
                    {hero}
                </div>
                {aside}
            </div>

            {/* Form Panel */}
            <div className={`w-full lg:w-[540px] bg-white px-8 sm:px-16 ${formPaddingClassName} flex items-center justify-center`}>
                <div className="w-full max-w-sm">{children}</div>
            </div>
        </div>
    );
}
