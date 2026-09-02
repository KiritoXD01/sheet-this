interface Props {
    quote: string;
    name: string;
    role: string;
    avatarClassName?: string;
}

export function Testimonial({ quote, name, role, avatarClassName = 'bg-accent' }: Props) {
    return (
        <div className="bg-brand-card rounded-xl px-6 py-5 flex flex-col gap-3">
            <p className="text-brand-muted font-inter text-sm italic leading-relaxed">{quote}</p>
            <div className="flex items-center gap-2.5">
                <div className={`w-8 h-8 rounded-full ${avatarClassName}`} />
                <div className="flex flex-col gap-0.5">
                    <span className="text-white font-inter font-semibold text-[13px]">{name}</span>
                    <span className="text-brand-muted text-xs font-inter">{role}</span>
                </div>
            </div>
        </div>
    );
}
