import { ProjectGridItem } from '@/Components/ProjectGridItem';
import AppLayout from '@/Layouts/AppLayout';
import { Project } from '@/types';
import { Plus } from 'lucide-react';

export default function Projects() {
    const projects: Project[] = [
        {
            id: '1',
            name: 'Acme Corp Website',
        },
        {
            id: '2',
            name: 'DevTools Pro',
        },
        {
            id: '3',
            name: 'Bloom App',
        },
        {
            id: '4',
            name: 'Portfolio Revamp',
        },
        {
            id: '3',
            name: 'Bloom App',
        },
        {
            id: '4',
            name: 'Portfolio Revamp',
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
                            <ProjectGridItem key={project.id} project={project} />
                        ))}
                    </div>

                </div>
            </div>
        </AppLayout>
    );
}
