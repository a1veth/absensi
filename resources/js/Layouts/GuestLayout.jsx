import ApplicationLogo from "@/Components/ui/ApplicationLogo";
import { Link } from "@inertiajs/react";

export default function Guest({ children }) {
    return (
        <div className="min-h-screen">
            <link
                href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
                rel="stylesheet"
            />
            <div className="bg-bg absolute top-0 left-0 bg-bg bottom-0 leading-5 h-full w-full overflow-hidden"></div>
            <div className="relative min-h-screen sm:flex sm:flex-row justify-center bg-transparent rounded-3xl shadow-xl">
                {children}
            </div>
        </div>
    );
}
