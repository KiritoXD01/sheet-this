export interface User {
    id: string;
    name: string;
    email: string;
}

export interface Project {
    id: string;
    name: string;
    color: string;
}

export interface Flash {
    message?: string | null;
    status?: string | null;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User | null;
    };
    flash: Flash;
};
