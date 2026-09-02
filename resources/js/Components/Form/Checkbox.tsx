import { InputHTMLAttributes, ReactNode } from 'react';

interface Props extends InputHTMLAttributes<HTMLInputElement> {
    id: string;
    label: ReactNode;
    error?: string;
}

export function Checkbox({ id, label, error, className = '', ...inputProps }: Props) {
    return (
        <div className="flex flex-col gap-1.5">
            <label htmlFor={id} className="flex items-center gap-2 cursor-pointer">
                <input
                    id={id}
                    type="checkbox"
                    className={`w-[18px] h-[18px] shrink-0 rounded border border-gray-300 bg-inset accent-accent ${className}`}
                    {...inputProps}
                />
                <span className="text-gray-700 font-inter text-[13px]">{label}</span>
            </label>
            {error && <p className="text-red-500 font-inter text-xs">{error}</p>}
        </div>
    );
}
