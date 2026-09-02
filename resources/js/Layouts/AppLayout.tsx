import { UserSection } from '@/Components/UserSection';
import { index as dashboard, projects, timesheet } from '@/routes/dashboard';
import { Link, usePage } from '@inertiajs/react';
import { Clock, Folder, LayoutDashboard, LucideIcon, Timer } from 'lucide-react';
import { ReactNode } from 'react';

interface NavItem {
    name: string;
    href: string;
    icon: LucideIcon;
    exact?: boolean;
}

const NAV_ITEMS: NavItem[] = [
    { name: 'Dashboard', href: dashboard().url, icon: LayoutDashboard, exact: true },
    { name: 'Projects', href: projects().url, icon: Folder },
    { name: 'Timesheet', href: timesheet().url, icon: Clock },
];

export default function AppLayout({ children }: { children: ReactNode }) {
    const { url } = usePage();
    const path = url.split('?')[0];

    return (
        <div className="flex h-screen bg-white">
            {/* Sidebar */}
            <aside className="w-60 shrink-0 bg-inset border-r border-gray-200 flex flex-col px-4 py-6">
                <div className="flex items-center gap-2.5 px-2.5 mb-6">
                    <Timer className="w-6 h-6 text-gray-500" />
                    <span className="text-gray-900 font-jetbrains font-bold text-lg">SheetThis</span>
                </div>

                <nav className="flex flex-col gap-1 flex-1">
                    {NAV_ITEMS.map((item) => {
                        const isActive = item.exact ? path === item.href : path.startsWith(item.href);
                        const Icon = item.icon;

                        return (
                            <Link
                                key={item.name}
                                href={item.href}
                                className={`flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors ${
                                    isActive ? 'bg-accent text-white font-semibold' : 'text-gray-900 font-medium hover:bg-gray-100'
                                }`}
                            >
                                <Icon className={`w-5 h-5 ${isActive ? 'text-white' : 'text-gray-500'}`} />
                                {item.name}
                            </Link>
                        );
                    })}
                </nav>

                <UserSection />
            </aside>

            {/* Main Content */}
            <main className="flex-1 min-w-0 overflow-auto">{children}</main>
        </div>
    );
}
