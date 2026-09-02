import AppLayout from '@/Layouts/AppLayout';

export default function PrivacyPolicy() {
    return (
        <AppLayout>
            <div className="flex h-full">
                {/* Main Content Area */}
                <div className="flex-1 p-8 overflow-y-auto">
                    <div className="max-w-4xl mx-auto">
                        <div className="bg-white rounded-xl border border-gray-200 p-8 shadow-sm">
                            <h1 className="text-3xl font-bold text-gray-900 font-jetbrains mb-6">Privacy Policy</h1>
                            
                            <div className="prose prose-gray max-w-none">
                                <p className="text-gray-600 mb-6">
                                    Last updated: {new Date().toLocaleDateString()}
                                </p>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">1. Information We Collect</h2>
                                    <p className="text-gray-600 mb-3">
                                        We collect information that you provide directly to us, including:
                                    </p>
                                    <ul className="list-disc list-inside text-gray-600 space-y-1 ml-4">
                                        <li>Name and contact information when you create an account</li>
                                        <li>Email address for communication and password recovery</li>
                                        <li>Usage data and analytics information</li>
                                        <li>Device and browser information</li>
                                    </ul>
                                </section>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">2. How We Use Your Information</h2>
                                    <p className="text-gray-600 mb-3">
                                        We use the information we collect to:
                                    </p>
                                    <ul className="list-disc list-inside text-gray-600 space-y-1 ml-4">
                                        <li>Provide, maintain, and improve our services</li>
                                        <li>Process transactions and send notifications</li>
                                        <li>Communicate with you about products and services</li>
                                        <li>Prevent fraud and protect our platform</li>
                                        <li>Comply with legal obligations</li>
                                    </ul>
                                </section>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">3. Data Security</h2>
                                    <p className="text-gray-600 mb-3">
                                        We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, alteration, disclosure, or destruction.
                                    </p>
                                </section>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">4. Cookies and Tracking</h2>
                                    <p className="text-gray-600 mb-3">
                                        We use cookies and similar tracking technologies to collect information about your browsing activities. You can control cookies through your browser settings.
                                    </p>
                                </section>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">5. Your Rights</h2>
                                    <p className="text-gray-600 mb-3">
                                        You have the right to:
                                    </p>
                                    <ul className="list-disc list-inside text-gray-600 space-y-1 ml-4">
                                        <li>Access your personal data</li>
                                        <li>Request correction of inaccurate data</li>
                                        <li>Request deletion of your data</li>
                                        <li>Object to processing of your data</li>
                                        <li>Data portability</li>
                                    </ul>
                                </section>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">6. Third-Party Services</h2>
                                    <p className="text-gray-600 mb-3">
                                        We may use third-party services such as analytics providers, payment processors, and email services. These third parties have their own privacy policies.
                                    </p>
                                </section>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">7. Changes to This Policy</h2>
                                    <p className="text-gray-600 mb-3">
                                        We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.
                                    </p>
                                </section>

                                <section className="mb-8">
                                    <h2 className="text-xl font-semibold text-gray-900 font-jetbrains mb-3">8. Contact Us</h2>
                                    <p className="text-gray-600 mb-3">
                                        If you have any questions about this Privacy Policy, please contact us at:
                                    </p>
                                    <p className="text-gray-600">
                                        Email: privacy@sheet-this.com
                                    </p>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
