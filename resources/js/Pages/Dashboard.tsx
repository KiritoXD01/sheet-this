import AppLayout from '@/Layouts/AppLayout';
import { Square } from 'lucide-react';

interface Entry {
    id: number;
    name: string;
    project: string;
    duration: string;
}

interface WeeklyStat {
    day: string;
    hours: string;
    percent: number;
}

export default function Dashboard() {
    const entries: Entry[] = [
        { id: 1, name: 'Landing page redesign', project: 'Acme Corp Website', duration: '01:24:37' },
        { id: 2, name: 'API integration docs', project: 'DevTools Pro', duration: '02:15:00' },
        { id: 3, name: 'User research interviews', project: 'Bloom App', duration: '00:45:12' },
        { id: 4, name: 'Email template design', project: 'Acme Corp Website', duration: '00:32:48' },
    ];

    const weeklyStats: WeeklyStat[] = [
        { day: 'MON', hours: '6:30', percent: 100 },
        { day: 'TUE', hours: '5:15', percent: 82 },
        { day: 'WED', hours: '7:20', percent: 115 },
        { day: 'THU', hours: '7:00', percent: 110 },
        { day: 'FRI', hours: '5:40', percent: 90 },
        { day: 'SAT', hours: '1:00', percent: 20 },
        { day: 'SUN', hours: '0:00', percent: 0 },
    ];

    return (
        <AppLayout>
            <div className="flex h-full">
                {/* Main Content Area */}
                <div className="flex-1 p-8 overflow-y-auto">
                    <div className="flex flex-col gap-8 max-w-4xl mx-auto">

                        {/* Active Timer */}
                        <div className="bg-white rounded-xl border border-gray-200 p-6 flex items-center justify-between shadow-sm">
                            <div className="flex flex-col gap-1.5">
                                <h2 className="text-gray-900 text-[15px] font-semibold font-inter">Landing page redesign</h2>
                                <div className="flex items-center gap-2">
                                    <div className="w-2 h-2 rounded-full bg-violet-600"></div>
                                    <span className="text-gray-500 text-xs font-inter">Acme Corp Website</span>
                                </div>
                            </div>

                            <div className="flex items-center gap-5">
                                <span className="text-violet-600 font-jetbrains font-bold text-4xl tracking-tight">01:24:37</span>
                                <button className="bg-red-500 hover:bg-red-600 transition-colors text-white rounded-md px-5 py-3 flex items-center gap-2 font-jetbrains text-xs font-semibold tracking-widest shadow-sm">
                                    <Square className="w-4 h-4 fill-current" />
                                    STOP
                                </button>
                            </div>
                        </div>

                        {/* Today's Entries */}
                        <div className="flex flex-col gap-3">
                            <h3 className="text-gray-500 text-[11px] font-inter font-semibold tracking-widest uppercase">Today's Entries</h3>

                            <div className="flex flex-col gap-3">
                                {entries.map((entry) => (
                                    <div key={entry.id} className="bg-white rounded-lg border border-gray-200 p-4 flex items-center justify-between shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                                        <div className="flex flex-col gap-0.5">
                                            <span className="text-gray-900 text-sm font-medium font-inter">{entry.name}</span>
                                            <span className="text-gray-500 text-xs font-inter">{entry.project}</span>
                                        </div>
                                        <span className="text-violet-600 font-jetbrains font-semibold text-sm">{entry.duration}</span>
                                    </div>
                                ))}
                            </div>
                        </div>

                    </div>
                </div>

                {/* Right Sidebar */}
                <aside className="w-[300px] border-l border-gray-200 bg-white p-6 flex flex-col gap-6 overflow-y-auto hidden xl:flex">

                    {/* Weekly Summary */}
                    <div className="bg-white rounded-xl border border-gray-200 p-5 flex flex-col gap-4 shadow-sm">
                        <div className="flex items-center justify-between">
                            <span className="text-gray-500 text-[11px] font-inter font-semibold tracking-widest uppercase">WEEKLY SUMMARY</span>
                            <span className="text-violet-600 font-jetbrains font-bold text-xl">32:45</span>
                        </div>

                        <div className="flex flex-col gap-2.5">
                            {weeklyStats.map((stat) => (
                                <div key={stat.day} className="flex items-center gap-3 text-[11px] font-jetbrains font-medium">
                                    <span className="text-gray-900 w-8 font-semibold tracking-wide">{stat.day}</span>
                                    <div className="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div
                                            className="h-full bg-violet-600 rounded-full"
                                            style={{ width: `${Math.min(stat.percent, 100)}%` }}
                                        ></div>
                                    </div>
                                    <span className="text-gray-900 w-8 text-right">{stat.hours}</span>
                                </div>
                            ))}
                        </div>
                    </div>

                    {/* Today Stats */}
                    <div className="bg-white rounded-xl border border-gray-200 p-5 flex flex-col gap-3 shadow-sm">
                        <span className="text-gray-500 text-[11px] font-inter font-semibold tracking-widest uppercase">TODAY</span>
                        <span className="text-violet-600 font-jetbrains font-bold text-[32px] leading-none">04:57</span>
                        <span className="text-gray-500 text-xs font-jetbrains font-medium">4 entries · 3 projects</span>
                    </div>

                </aside>
            </div>
        </AppLayout>
    );
}
