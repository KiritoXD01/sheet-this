import { LucideIcon } from 'lucide-react';
import { InputHTMLAttributes, ReactNode } from 'react';

interface Props extends InputHTMLAttributes<HTMLInputElement> {
    id: string;
    label: string;
    icon?: LucideIcon;
    trailing?: ReactNode;
    error?: string;
}

export function TextInput({ id, label, icon: Icon, trailing, error, className = '', ...inputProps }: Props) {
    return (
        <div className="flex flex-col gap-1.5">
            <label htmlFor={id} className="text-gray-400 text-[11px] font-inter font-semibold tracking-widest uppercase">
                {label}
            </label>
            <div
                className={`flex items-center gap-2.5 bg-inset border rounded-lg px-4 py-3 transition-colors focus-within:border-accent ${
                    error ? 'border-red-400' : 'border-gray-200'
                }`}
            >
                {Icon && <Icon className="w-4 h-4 shrink-0 text-gray-400" />}
                <input
                    id={id}
                    className={`flex-1 min-w-0 bg-transparent text-gray-900 font-inter text-sm outline-none placeholder:text-gray-300 ${className}`}
                    aria-invalid={error ? true : undefined}
                    {...inputProps}
                />
                {trailing}
            </div>
            {error && <p className="text-red-500 font-inter text-xs">{error}</p>}
        </div>
    );
}
