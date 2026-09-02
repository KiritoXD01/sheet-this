import { Project } from '@/types';
import { Pencil } from 'lucide-react';

interface Props {
    project: Project;
    onEdit?: () => void;
}

export function ProjectGridItem({ project, onEdit }: Props) {
    return (
        <div className="group bg-white rounded-xl border border-gray-200 p-5 flex flex-col gap-3.5 hover:border-gray-300 transition-colors">

            {/* Card Header */}
            <div className="flex items-start justify-between gap-2">
                <div className="flex items-center gap-2.5">
                    <div
                        className="w-2.5 h-2.5 rounded-full shrink-0"
                        style={{ backgroundColor: project.color ?? '#7C3AED' }}
                    />
                    <h3 className="text-gray-900 font-inter font-semibold text-[15px]">{project.name}</h3>
                </div>
                {onEdit && (
                    <button
                        onClick={(e) => { e.stopPropagation(); onEdit(); }}
                        className="opacity-0 group-hover:opacity-100 focus:opacity-100 transition-opacity p-1 rounded-md hover:bg-gray-100 text-gray-400 hover:text-gray-600 cursor-pointer"
                        aria-label="Edit project"
                    >
                        <Pencil className="w-3.5 h-3.5" />
                    </button>
                )}
            </div>

            {/* Stats */}
            <div className="flex items-center gap-4 ml-5">
                <span className="text-gray-900 font-jetbrains font-bold text-xl">0:00</span>
                <span className="text-gray-900 font-jetbrains font-medium text-xs">0 tasks</span>
            </div>

            {/* Budget Bar */}
            <div className="flex flex-col gap-1.5 ml-5">
                <div className="flex items-center justify-between">
                    <span className="text-gray-900 text-[10px] font-inter font-semibold tracking-widest uppercase">BUDGET</span>
                    <span className="text-gray-900 font-jetbrains font-semibold text-[11px]">0%</span>
                </div>
                <div className="w-full h-1 bg-gray-200 rounded-full overflow-hidden">
                    <div
                        className="h-full rounded-full"
                        style={{ width: '0%', backgroundColor: project.color ?? '#7C3AED' }}
                    />
                </div>
            </div>

        </div>
    );
}
