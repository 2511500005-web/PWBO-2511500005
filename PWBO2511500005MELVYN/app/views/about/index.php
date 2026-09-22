<div class="container">
    <h1 class="mt-4">About Me</h1>

    <div class="about-photo-wrap">
        <svg viewBox="0 0 220 220" xmlns="http://www.w3.org/2000/svg">
            <circle cx="110" cy="110" r="110" fill="#FFD54A"/>
            <!-- telinga -->
            <circle cx="60" cy="55" r="26" fill="#8B5E34"/>
            <circle cx="160" cy="55" r="26" fill="#8B5E34"/>
            <circle cx="60" cy="55" r="13" fill="#5C3A21"/>
            <circle cx="160" cy="55" r="13" fill="#5C3A21"/>
            <!-- kepala -->
            <circle cx="110" cy="115" r="70" fill="#8B5E34"/>
            <!-- muka -->
            <ellipse cx="110" cy="128" rx="48" ry="40" fill="#F3D9B1"/>
            <!-- mata -->
            <circle cx="90" cy="118" r="6" fill="#2b2b2b"/>
            <circle cx="130" cy="118" r="6" fill="#2b2b2b"/>
            <!-- hidung -->
            <ellipse cx="110" cy="135" rx="9" ry="7" fill="#2b2b2b"/>
            <!-- mulut -->
            <path d="M95 148 Q110 158 125 148" stroke="#2b2b2b" stroke-width="3" fill="none" stroke-linecap="round"/>
            <!-- pipi -->
            <circle cx="78" cy="138" r="8" fill="#F5B7B1" opacity="0.7"/>
            <circle cx="142" cy="138" r="8" fill="#F5B7B1" opacity="0.7"/>
        </svg>
    </div>

    <p>Halo, nama saya <?php echo $data['nama']; ?>, saya adalah seorang <?php echo $data['pekerjaan']; ?></p>
</div>
