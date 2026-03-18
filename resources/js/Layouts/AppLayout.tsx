import { Link, usePage } from '@inertiajs/react';
import { Timer, LayoutDashboard, Folder, Clock, LucideIcon } from 'lucide-react';
import { ReactNode } from 'react';
import { UserSection } from '@/Components/UserSection';

interface NavItem {
    name: string;
    href: string;
    icon: LucideIcon;
}

export default function AppLayout({ children }: { children: ReactNode }) {
    const { url } = usePage();

    const navItems: NavItem[] = [
        { name: 'Dashboard', href: '/', icon: LayoutDashboard },
        { name: 'Projects', href: '/dashboard/projects', icon: Folder },
        { name: 'Timesheet', href: '/dashboard/timesheet', icon: Clock },
    ];

    return (
        <div className="flex h-screen bg-white">
            {/* Sidebar */}
            <aside className="w-60 bg-[#F8F7FC] border-r border-gray-200 flex flex-col px-6 py-6">
                {/* Logo */}
                <div className="flex items-center gap-2.5 mb-6">
                    <Timer className="w-6 h-6 text-gray-500" />
                    <span className="text-gray-900 font-jetbrains font-bold text-lg">SheetThis</span>
                </div>

                {/* Navigation */}
                <nav className="flex flex-col gap-1 flex-1">
                    {navItems.map((item) => {
                        const isActive = url === item.href;
                        const Icon = item.icon;
                        return (
                            <Link
                                key={item.name}
                                href={item.href}
                                className={`flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors ${isActive
                                    ? 'bg-violet-600 text-white'
                                    : 'text-gray-700 hover:bg-gray-100'
                                    }`}
                            >
                                <Icon className={`w-5 h-5 ${isActive ? 'text-white' : 'text-gray-500'}`} />
                                {item.name}
                            </Link>
                        );
                    })}
                </nav>

                {/* User Section */}
                <UserSection />
            </aside>

            {/* Main Content */}
            <main className="flex-1 overflow-auto">
                {children}
            </main>
        </div>
    );
}
