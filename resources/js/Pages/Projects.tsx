import { ProjectGridItem } from '@/Components/ProjectGridItem';
import { ProjectModal } from '@/Components/ProjectModal';
import AppLayout from '@/Layouts/AppLayout';
import { Project } from '@/types';
import { Plus } from 'lucide-react';
import { useState } from 'react';

interface Props {
    projects: Project[];
}

export default function Projects({ projects }: Props) {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [editingProject, setEditingProject] = useState<Project | undefined>(undefined);

    function openCreateModal() {
        setEditingProject(undefined);
        setIsModalOpen(true);
    }

    function openEditModal(project: Project) {
        setEditingProject(project);
        setIsModalOpen(true);
    }

    function closeModal() {
        setIsModalOpen(false);
        setEditingProject(undefined);
    }

    return (
        <AppLayout>
            <div className="flex-1 p-8 overflow-y-auto">
                <div className="flex flex-col gap-6 max-w-5xl mx-auto">

                    {/* Header */}
                    <div className="flex items-center justify-between">
                        <h1 className="text-gray-900 font-inter font-semibold text-2xl">Projects</h1>
                        <button
                            onClick={openCreateModal}
                            className="bg-accent hover:bg-accent/90 transition-colors text-white rounded-md px-4 py-2.5 flex items-center gap-2 cursor-pointer"
                        >
                            <Plus className="w-4 h-4" />
                            <span className="font-inter font-semibold text-[13px]">New Project</span>
                        </button>
                    </div>

                    {/* Project Grid */}
                    {projects.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {projects.map((project) => (
                                <ProjectGridItem
                                    key={project.id}
                                    project={project}
                                    onEdit={() => openEditModal(project)}
                                />
                            ))}
                        </div>
                    ) : (
                        <div className="flex flex-col items-center justify-center py-24 gap-4 text-center">
                            <div className="w-14 h-14 rounded-2xl bg-accent-light flex items-center justify-center">
                                <Plus className="w-7 h-7 text-accent" />
                            </div>
                            <div>
                                <p className="font-inter font-semibold text-gray-900">No projects yet</p>
                                <p className="font-inter text-sm text-gray-400 mt-1">Create your first project to start tracking time.</p>
                            </div>
                            <button
                                onClick={openCreateModal}
                                className="bg-accent hover:bg-accent/90 transition-colors text-white rounded-lg px-5 py-2.5 font-inter font-semibold text-sm"
                            >
                                Create Project
                            </button>
                        </div>
                    )}

                </div>
            </div>

            {/* Modal */}
            {isModalOpen && (
                <ProjectModal
                    project={editingProject}
                    onClose={closeModal}
                />
            )}
        </AppLayout>
    );
}
