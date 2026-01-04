<div
    class="lg:col-span-2 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 flex flex-col">
    <div
        class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center bg-slate-50/50 dark:bg-slate-800/50">
        <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
            <span class="material-symbols-outlined text-slate-400">history</span>
            Recent Requests
        </h2>
        <button class="text-sm text-primary hover:text-primary-hover font-medium">View All</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
            <thead
                class="bg-slate-50 dark:bg-slate-800 text-xs uppercase font-semibold text-slate-500 dark:text-slate-400">
                <tr>
                    <th class="px-6 py-4">Type</th>
                    <th class="px-6 py-4">Dates</th>
                    <th class="px-6 py-4">Days</th>
                    <th class="px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                @forelse($requests as $request)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                                <span
                                    class="font-medium text-slate-900 dark:text-slate-100">{{ $request->request_type->label() }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $request->start_date->format('M d') }} -
                            {{ $request->end_date->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            {{ $request->days }}
                            {{ $request->days == 1 ? 'Day' : 'Days' }}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $request->status->bgColor() }} {{ $request->status->textColor() }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $request->status->dotColor() }}"></span>
                                {{ $request->status->label() }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-slate-500 dark:text-slate-400">
                            No requests found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
