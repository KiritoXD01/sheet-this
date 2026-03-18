import AppLayout from '@/Layouts/AppLayout';
import { Download, ChevronLeft, ChevronRight } from 'lucide-react';

export default function Timesheet() {
    const entries = [
        { id: 1, name: 'Brand Redesign', client: 'Acme Corp', mon: '3:30', tue: '4:00', wed: '2:15', thu: '3:45', fri: '2:00', sat: '—', sun: '—', total: '15:30', color: 'bg-violet-600' },
        { id: 2, name: 'Mobile App MVP', client: 'StartupXYZ', mon: '2:00', tue: '1:30', wed: '3:00', thu: '2:00', fri: '1:45', sat: '—', sun: '—', total: '10:15', color: 'bg-purple-400' },
        { id: 3, name: 'API Integration', client: 'DataFlow Inc', mon: '1:00', tue: '—', wed: '2:30', thu: '1:30', fri: '1:00', sat: '2:00', sun: '—', total: '8:00', color: 'bg-orange-500' },
        { id: 4, name: 'Content Writing', client: 'BlogMedia Co', mon: '—', tue: '0:30', wed: '—', thu: '—', fri: '—', sat: '—', sun: '—', total: '0:30', color: 'bg-emerald-400' },
    ];

    const dailyTotals = { mon: '6:30', tue: '6:00', wed: '7:45', thu: '7:15', fri: '4:45', sat: '2:00', sun: '—' };

    return (
        <AppLayout>
            <div className="flex-1 p-8 overflow-y-auto">
                <div className="flex flex-col gap-6 h-full">
                    
                    {/* Header */}
                    <div className="flex items-center justify-between">
                        <div className="flex flex-col gap-1">
                            <h1 className="text-gray-900 font-inter font-semibold text-2xl">Timesheet</h1>
                            <p className="text-gray-700 text-[13px] font-inter">Track your weekly hours by project</p>
                        </div>
                        <div className="flex items-center gap-3">
                            <button className="border border-gray-200 rounded-lg px-4 py-2.5 flex items-center gap-2 hover:bg-gray-50 transition-colors">
                                <Download className="w-4 h-4 text-gray-600" />
                                <span className="text-gray-700 font-inter font-medium text-[13px]">Export</span>
                            </button>
                        </div>
                    </div>

                    {/* Week Navigation */}
                    <div className="flex items-center justify-between">
                        <div className="flex items-center gap-2">
                            <button className="border border-gray-200 rounded-md p-2 hover:bg-gray-50 transition-colors">
                                <ChevronLeft className="w-4 h-4 text-gray-500" />
                            </button>
                            <span className="text-gray-900 font-jetbrains font-semibold text-[15px] px-2">Mar 9 — Mar 15, 2026</span>
                            <button className="border border-gray-200 rounded-md p-2 hover:bg-gray-50 transition-colors">
                                <ChevronRight className="w-4 h-4 text-gray-500" />
                            </button>
                        </div>
                        <div className="flex items-center gap-2">
                            <span className="text-gray-900 text-[11px] font-inter font-semibold tracking-widest uppercase">Week Total</span>
                            <span className="text-violet-600 font-jetbrains font-bold text-xl">34:15</span>
                        </div>
                    </div>

                    {/* Timesheet Table */}
                    <div className="bg-white rounded-xl border border-gray-200 flex flex-col flex-1 overflow-hidden">
                        {/* Table Header */}
                        <div className="bg-[#F8F7FC] px-4 py-4 flex items-center border-b border-gray-200">
                            <div className="w-[200px] flex-shrink-0">
                                <span className="text-gray-900 text-[11px] font-inter font-semibold tracking-widest uppercase">Project / Task</span>
                            </div>
                            {['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'].map((day, i) => (
                                <div key={day} className="flex-1 flex flex-col items-center gap-0.5">
                                    <span className="text-gray-900 text-[10px] font-jetbrains font-semibold tracking-wider">{day}</span>
                                    <span className="text-gray-900 text-[13px] font-jetbrains font-medium">{[9, 10, 11, 12, 13, 14, 15][i]}</span>
                                </div>
                            ))}
                            <div className="w-[70px] flex-shrink-0 text-right">
                                <span className="text-gray-900 text-[11px] font-inter font-semibold tracking-widest uppercase">Total</span>
                            </div>
                        </div>

                        {/* Table Rows */}
                        {entries.map((entry) => (
                            <div key={entry.id} className="px-4 py-3.5 flex items-center border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                <div className="w-[200px] flex-shrink-0 flex items-center gap-2.5">
                                    <div className={`w-2 h-2 rounded-full ${entry.color}`}></div>
                                    <div className="flex flex-col gap-0.5">
                                        <span className="text-gray-900 text-sm font-medium font-inter">{entry.name}</span>
                                        <span className="text-gray-700 text-[11px] font-inter">{entry.client}</span>
                                    </div>
                                </div>
                                {['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'].map((day) => (
                                    <div key={day} className="flex-1 flex justify-center">
                                        <span className="text-gray-900 text-[13px] font-jetbrains font-medium">{entry[day]}</span>
                                    </div>
                                ))}
                                <div className="w-[70px] flex-shrink-0 text-right">
                                    <span className="text-gray-900 text-[13px] font-jetbrains font-bold">{entry.total}</span>
                                </div>
                            </div>
                        ))}

                        {/* Spacer */}
                        <div className="flex-1"></div>

                        {/* Daily Totals Row */}
                        <div className="bg-[#F8F7FC] px-4 py-3.5 flex items-center border-t border-gray-200">
                            <div className="w-[200px] flex-shrink-0">
                                <span className="text-gray-900 text-[11px] font-inter font-semibold tracking-widest uppercase">Daily Total</span>
                            </div>
                            {['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'].map((day) => (
                                <div key={day} className="flex-1 flex justify-center">
                                    <span className="text-gray-900 text-[13px] font-jetbrains font-bold">{dailyTotals[day]}</span>
                                </div>
                            ))}
                            <div className="w-[70px] flex-shrink-0 text-right">
                                <span className="text-violet-600 text-[13px] font-jetbrains font-bold">34:15</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </AppLayout>
    );
}
