import AppLayout from '@/Layouts/AppLayout';
import { Plus } from 'lucide-react';

interface Project {
    id: number;
    name: string;
    client: string;
    hours: string;
    tasks: string;
    budgetPercent: number;
    color: string;
    textColor: string;
}

export default function Projects() {
    const projects: Project[] = [
        {
            id: 1,
            name: 'Acme Corp Website',
            client: 'Acme Corporation',
            hours: '47:32',
            tasks: '12 tasks',
            budgetPercent: 68,
            color: 'bg-violet-600',
            textColor: 'text-violet-600',
        },
        {
            id: 2,
            name: 'DevTools Pro',
            client: 'StartupXYZ',
            hours: '124:15',
            tasks: '28 tasks',
            budgetPercent: 82,
            color: 'bg-purple-400', // approximation for #A78BFA
            textColor: 'text-purple-400',
        },
        {
            id: 3,
            name: 'Bloom App',
            client: 'Bloom Health Inc.',
            hours: '89:40',
            tasks: '19 tasks',
            budgetPercent: 45,
            color: 'bg-orange-500', // #F97316
            textColor: 'text-orange-500',
        },
        {
            id: 4,
            name: 'Portfolio Revamp',
            client: 'Personal',
            hours: '12:05', // details truncated in .pen, adding placeholder
            tasks: '5 tasks',
            budgetPercent: 20,
            color: 'bg-emerald-400', // #34D399
            textColor: 'text-emerald-400',
        },
    ];

    return (
        <AppLayout>
            <div className="flex-1 p-8 overflow-y-auto">
                <div className="flex flex-col gap-8 max-w-5xl mx-auto">
                    
                    {/* Header */}
                    <div className="flex items-center justify-between">
                        <h1 className="text-gray-900 font-inter font-semibold text-2xl">Projects</h1>
                        <button className="bg-gray-600 hover:bg-gray-700 transition-colors text-white rounded-md px-4 py-2.5 flex items-center gap-2 shadow-sm">
                            <Plus className="w-4 h-4" />
                            <span className="font-inter font-semibold text-[13px]">New Project</span>
                        </button>
                    </div>

                    {/* Project Grid */}
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {projects.map((project) => (
                            <div key={project.id} className="bg-white rounded-xl border border-gray-200 p-5 flex flex-col gap-3.5 shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                                
                                {/* Card Header */}
                                <div className="flex flex-col gap-2.5">
                                    <div className="flex items-center gap-2.5">
                                        <div className={`w-2.5 h-2.5 rounded-full ${project.color}`}></div>
                                        <h3 className="text-gray-900 font-inter font-semibold text-[15px]">{project.name}</h3>
                                    </div>
                                    <span className="text-gray-500 text-xs font-inter ml-5">Client: {project.client}</span>
                                </div>

                                {/* Stats */}
                                <div className="flex items-center gap-4 ml-5">
                                    <span className="text-gray-900 font-jetbrains font-bold text-xl">{project.hours}</span>
                                    <span className="text-gray-900 font-jetbrains font-medium text-xs">{project.tasks}</span>
                                </div>

                                {/* Budget Bar */}
                                <div className="flex flex-col gap-1.5 ml-5">
                                    <div className="flex items-center justify-between">
                                        <span className="text-gray-900 text-[10px] font-inter font-semibold tracking-widest uppercase">BUDGET</span>
                                        <span className="text-gray-900 font-jetbrains font-semibold text-[11px]">{project.budgetPercent}%</span>
                                    </div>
                                    <div className="w-full h-1 bg-gray-500/20 rounded-full overflow-hidden">
                                        <div 
                                            className={`h-full rounded-full ${project.color}`} 
                                            style={{ width: `${project.budgetPercent}%` }}
                                        ></div>
                                    </div>
                                </div>

                            </div>
                        ))}
                    </div>

                </div>
            </div>
        </AppLayout>
    );
}
