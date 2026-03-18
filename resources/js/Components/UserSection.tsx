import { Link, usePage } from '@inertiajs/react';
import { LogOut, ChevronDown } from 'lucide-react';
import { useState } from 'react';
import { PageProps } from '@/types';

export function UserSection() {
    const { auth } = usePage<PageProps>().props;
    const [isUserDropdownOpen, setIsUserDropdownOpen] = useState(false);

    if (!auth.user) {
        return null;
    }

    return (
        <div className="relative">
            <div
                className="mt-auto flex items-center gap-3 px-2.5 py-2.5 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer"
                onClick={() => setIsUserDropdownOpen(!isUserDropdownOpen)}
            >
                <div className="w-8 h-8 rounded-full bg-violet-600 flex items-center justify-center text-white font-medium text-xs">
                    {auth.user.name.charAt(0).toUpperCase()}
                </div>
                <div className="flex-1">
                    <div className="text-gray-900 font-medium text-[13px]">{auth.user.name}</div>
                    <div className="text-gray-500 text-xs">{auth.user.email}</div>
                </div>
                <ChevronDown className={`w-4 h-4 text-gray-500 transition-transform ${isUserDropdownOpen ? 'rotate-180' : ''}`} />
            </div>

            {/* Dropdown Menu */}
            {isUserDropdownOpen && (
                <div className="absolute bottom-full left-0 right-0 mb-2 bg-white border border-gray-200 rounded-lg shadow-lg py-1 z-50">
                    <Link
                        href="/login/logout"
                        method="post"
                        as="button"
                        className="flex items-center gap-3 px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors w-full text-left"
                        onClick={() => setIsUserDropdownOpen(false)}
                    >
                        <LogOut className="w-4 h-4 text-gray-500" />
                        Logout
                    </Link>
                </div>
            )}
        </div>
    );
}
