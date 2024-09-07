<article @class([
    'prose prose-gray max-w-none dark:prose-invert dark:text-gray-300 main-content',
    'prose-headings:scroll-mt-16 prose-headings:font-heading prose-headings:font-extrabold prose-h1:font-4xl lg:prose-h1:text-5xl',
    'prose-lead:text-gray-500 dark:prose-lead:text-gray-300',
    'prose-code:font-normal prose-code:before:hidden prose-code:after:hidde',
    'prose-blockquote:not-italic [&_p]:before:hidden [&_p]:after:hidden',
    'dark:prose-hr:border-gray-700 prose-hr:border-dashed'
])>
    {{ $slot }}
</article>
