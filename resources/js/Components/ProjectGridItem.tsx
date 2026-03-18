import { Project } from "@/types";

interface Props {
    project: Project;
}

export function ProjectGridItem({ project }: Props) {
    return (
        <div className="bg-white rounded-xl border border-gray-200 p-5 flex flex-col gap-3.5 shadow-sm hover:shadow-md transition-shadow cursor-pointer">

            {/* Card Header */}
            <div className="flex flex-col gap-2.5">
                <div className="flex items-center gap-2.5">
                    <div className={`w-2.5 h-2.5 rounded-full`}></div>
                    <h3 className="text-gray-900 font-inter font-semibold text-[15px]">{project.name}</h3>
                </div>
            </div>

            {/* Stats */}
            <div className="flex items-center gap-4 ml-5">
                <span className="text-gray-900 font-jetbrains font-bold text-xl">0h</span>
                <span className="text-gray-900 font-jetbrains font-medium text-xs">0 tasks</span>
            </div>

            {/* Budget Bar */}
            <div className="flex flex-col gap-1.5 ml-5">
                <div className="flex items-center justify-between">
                    <span className="text-gray-900 text-[10px] font-inter font-semibold tracking-widest uppercase">BUDGET</span>
                    <span className="text-gray-900 font-jetbrains font-semibold text-[11px]">0%</span>
                </div>
                <div className="w-full h-1 bg-gray-500/20 rounded-full overflow-hidden">
                    <div
                        className={`h-full rounded-full`}
                        style={{ width: `0%` }}
                    ></div>
                </div>
            </div>

        </div>
    );
}
