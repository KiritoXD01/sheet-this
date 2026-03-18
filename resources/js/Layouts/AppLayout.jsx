import { Link, usePage } from '@inertiajs/react';
import { Timer, LayoutDashboard, Folder, Clock, ChartColumn, TrendingUp } from 'lucide-react';

export default function AppLayout({ children }) {
    const { url } = usePage();

    const navItems = [
        { name: 'Dashboard', href: '/', icon: LayoutDashboard },
        { name: 'Projects', href: '/projects', icon: Folder },
        { name: 'Timesheet', href: '/timesheet', icon: Clock },
        { name: 'Reports', href: '#', icon: ChartColumn },
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
                                className={`flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors ${
                                    isActive
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
                <div className="mt-auto flex items-center gap-3 px-2.5 py-2.5 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                    <div className="w-8 h-8 rounded-full bg-violet-600 flex items-center justify-center text-white font-medium text-xs">
                        B
                    </div>
                    <span className="text-gray-900 font-medium text-[13px]">bellota</span>
                </div>
            </aside>

            {/* Main Content */}
            <main className="flex-1 overflow-auto">
                {children}
            </main>
        </div>
    );
}
