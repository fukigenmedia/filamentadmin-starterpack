<div class="flex justify-center items-center p-12">
    <div class=" rounded-3xl w-11/12 h-5/6 md:w-9/12 md:h-5/6 overflow-y-auto">
        <div class="markdown-body p-12">
            {!! Illuminate\Mail\Markdown::parse(@file_get_contents(base_path('README.md'))) !!}
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.1.0/github-markdown-light.css" integrity="sha512-1d9gwwC3dNW3O+lGwY8zTQrh08a41Ejci46DdzY1aQbqi/7Qr8Asp4ycWPsoD52tKXKrgu8h/lSpig1aAkvlMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush