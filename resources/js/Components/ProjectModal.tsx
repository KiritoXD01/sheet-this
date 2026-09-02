import { store, update } from '@/actions/App/Http/Controllers/ProjectController';
import { Project } from '@/types';
import { useForm } from '@inertiajs/react';
import { Folder, X } from 'lucide-react';
import { useEffect, useState } from 'react';

const PROJECT_COLORS = [
    '#7C3AED',
    '#2563EB',
    '#059669',
    '#D97706',
    '#DC2626',
    '#DB2777',
    '#0891B2',
    '#4F46E5',
    '#16A34A',
    '#EA580C',
] as const;

const COLOR_NAMES: Record<string, string> = {
    '#7C3AED': 'Purple',
    '#2563EB': 'Blue',
    '#059669': 'Emerald',
    '#D97706': 'Amber',
    '#DC2626': 'Red',
    '#DB2777': 'Pink',
    '#0891B2': 'Cyan',
    '#4F46E5': 'Indigo',
    '#16A34A': 'Green',
    '#EA580C': 'Orange',
};

function getColorName(color: string): string {
    return COLOR_NAMES[color] || 'Custom';
}

function isValidHexColor(color: string): boolean {
    return /^#?[0-9A-Fa-f]{6}$/.test(color);
}

function normalizeHexColor(color: string): string {
    if (!color.startsWith('#')) {
        return `#${color}`;
    }
    return color.toUpperCase();
}

interface Props {
    project?: Project;
    onClose: () => void;
}

export function ProjectModal({ project, onClose }: Props) {
    const isEditing = Boolean(project);
    const [customColorInput, setCustomColorInput] = useState('');

    const { data, setData, post, put, processing, errors, reset } = useForm({
        name: project?.name ?? '',
        color: project?.color ?? '#7C3AED',
    });

    // Sync form when the project prop changes (e.g. switching which project to edit)
    useEffect(() => {
        setData({
            name: project?.name ?? '',
            color: project?.color ?? '#7C3AED',
        });
        setCustomColorInput('');
    }, [project?.id]);

    // Close on Escape
    useEffect(() => {
        function handleKeyDown(event: KeyboardEvent) {
            if (event.key === 'Escape') {
                onClose();
            }
        }

        window.addEventListener('keydown', handleKeyDown);

        return () => window.removeEventListener('keydown', handleKeyDown);
    }, [onClose]);

    function handleCustomColorChange(value: string) {
        setCustomColorInput(value);

        // Auto-update color if valid hex
        const cleanValue = value.replace('#', '');
        if (cleanValue.length === 6 && isValidHexColor(cleanValue)) {
            const normalizedColor = normalizeHexColor(cleanValue);
            setData('color', normalizedColor);
        }
    }

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        const options = {
            preserveScroll: true,
            onSuccess: () => { reset(); onClose(); },
        };

        if (project) {
            put(update(project.id).url, options);
        } else {
            post(store().url, options);
        }
    }

    return (
        /* Backdrop */
        <div
            className="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50"
            role="dialog"
            aria-modal="true"
            aria-labelledby="project-modal-title"
            onClick={onClose}
        >
            {/* Modal card */}
            <div
                className="relative w-80 rounded-2xl bg-white p-7 shadow-2xl"
                onClick={(e) => e.stopPropagation()}
            >
                <form onSubmit={handleSubmit} className="flex flex-col gap-6">

                    {/* Header */}
                    <div className="flex items-center justify-between">
                        <h2 id="project-modal-title" className="font-inter text-lg font-bold text-gray-900">
                            {isEditing ? 'Edit Project' : 'New Project'}
                        </h2>
                        <button
                            type="button"
                            onClick={onClose}
                            className="text-gray-400 hover:text-gray-600 transition-colors cursor-pointer"
                            aria-label="Close"
                        >
                            <X className="w-5 h-5" />
                        </button>
                    </div>

                    {/* Name field */}
                    <div className="flex flex-col gap-1.5">
                        <label className="font-inter text-[11px] font-semibold uppercase tracking-[2px] text-gray-400">
                            Project Name
                        </label>
                        <div className={`flex items-center gap-2 rounded-lg border px-3.5 py-2.5 bg-inset transition-colors ${errors.name ? 'border-red-400' : 'border-gray-200 focus-within:border-accent'
                            }`}>
                            <Folder className="w-4 h-4 shrink-0 text-accent" />
                            <input
                                type="text"
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                                placeholder="e.g. Website Redesign"
                                className="flex-1 bg-transparent text-sm text-gray-900 placeholder-gray-300 outline-none font-inter"
                                autoFocus
                            />
                        </div>
                        {errors.name && (
                            <p className="text-xs text-red-500">{errors.name}</p>
                        )}
                    </div>

                    {/* Color picker */}
                    <div className="flex flex-col gap-2">
                        <label className="font-inter text-[11px] font-semibold uppercase tracking-[2px] text-gray-400">
                            Project Color
                        </label>

                        {/* Swatches — 2 rows of 5 */}
                        <div className="flex flex-col gap-2">
                            {[PROJECT_COLORS.slice(0, 5), PROJECT_COLORS.slice(5)].map((row, rowIdx) => (
                                <div key={rowIdx} className="flex gap-2">
                                    {row.map((color) => (
                                        <button
                                            key={color}
                                            type="button"
                                            onClick={() => setData('color', color)}
                                            className="w-7 h-7 rounded-full transition-transform hover:scale-110 focus:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 cursor-pointer"
                                            style={{
                                                backgroundColor: color,
                                                boxShadow: data.color === color
                                                    ? `0 0 0 2px white, 0 0 0 4px ${color}`
                                                    : undefined,
                                            }}
                                            aria-label={COLOR_NAMES[color]}
                                        />
                                    ))}
                                </div>
                            ))}
                        </div>

                        {/* Custom color input */}
                        <div className="flex flex-col gap-1.5">
                            <label className="font-inter text-xs font-medium text-gray-500">
                                Custom Color
                            </label>
                            <div className="flex items-center gap-2 rounded-lg border border-gray-200 px-3.5 py-2.5 bg-inset transition-colors focus-within:border-accent">
                                <span className="font-inter text-sm font-semibold text-gray-400">#</span>
                                <input
                                    type="text"
                                    value={customColorInput}
                                    onChange={(e) => handleCustomColorChange(e.target.value)}
                                    placeholder="7C3AED"
                                    maxLength={6}
                                    className="flex-1 bg-transparent text-sm font-mono text-gray-900 placeholder-gray-300 outline-none"
                                />
                            </div>
                        </div>

                        {/* Selected color display */}
                        <div className="mt-1 flex items-center gap-2 rounded-lg bg-inset px-3 py-2">
                            <div
                                className="w-4 h-4 rounded-full shrink-0"
                                style={{ backgroundColor: data.color }}
                            />
                            <span className="font-inter text-sm font-medium text-gray-900">
                                {getColorName(data.color)}
                            </span>
                            <span className="ml-auto font-mono text-xs text-gray-400">
                                {data.color.toUpperCase()}
                            </span>
                        </div>
                    </div>

                    {/* Actions */}
                    <div className="flex gap-3">
                        <button
                            type="button"
                            onClick={onClose}
                            className="flex-1 rounded-lg border border-gray-200 py-2.5 font-inter text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            disabled={processing}
                            className="flex-1 rounded-lg bg-accent py-2.5 font-inter text-sm font-semibold text-white hover:bg-accent/90 cursor-pointer transition-colors disabled:opacity-60"
                        >
                            {processing
                                ? 'Saving…'
                                : isEditing ? 'Save Changes' : 'Create Project'
                            }
                        </button>
                    </div>

                </form>
            </div>
        </div>
    );
}
