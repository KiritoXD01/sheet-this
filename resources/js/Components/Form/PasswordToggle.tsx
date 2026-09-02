import { Eye, EyeOff } from 'lucide-react';

interface Props {
    visible: boolean;
    onToggle: () => void;
}

export function PasswordToggle({ visible, onToggle }: Props) {
    const Icon = visible ? Eye : EyeOff;

    return (
        <button
            type="button"
            onClick={onToggle}
            aria-label={visible ? 'Hide password' : 'Show password'}
            className="text-gray-400 hover:text-gray-600 transition-colors"
        >
            <Icon className="w-4 h-4" />
        </button>
    );
}
