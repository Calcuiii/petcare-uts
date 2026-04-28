<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare — Selamat Datang</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            width:100vw; height:100vh;
            background:#2b1200;
            display:flex; align-items:center; justify-content:center;
            overflow:hidden; font-family:'Georgia', serif;
        }

        #screen {
            width:100%; height:100vh;
            display:flex; align-items:center; justify-content:center;
            position:relative; overflow:hidden;
        }

        #intro {
            display:flex; flex-direction:column; align-items:center;
            position:relative; z-index:2;
            transition: opacity 1s ease;
        }
        #intro.fadeout { opacity:0; pointer-events:none; }

        #paw-label {
            font-size:0.78rem; letter-spacing:0.25em; text-transform:uppercase;
            color:rgba(255,220,170,0.5); margin-bottom:1.2rem;
            font-family:sans-serif;
        }

        #welcome {
            position:absolute; z-index:3;
            text-align:center; width:100%;
            opacity:0; transform:scale(0.96);
            transition: opacity 1.1s ease, transform 1.1s ease;
            pointer-events:none; padding:2rem;
        }
        #welcome.show { opacity:1; transform:scale(1); pointer-events:all; }

        #welcome h1 {
            font-size:2.4rem; color:#fff8f0;
            margin-bottom:0.4rem;
            text-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }
        #welcome .tagline {
            font-size:0.95rem; color:rgba(255,248,240,0.65);
            font-family:sans-serif; margin-bottom:2rem;
            letter-spacing:0.04em;
        }
        #login-btn {
            background:#fff8f0; color:#3d1f0d;
            border:none; padding:0.75rem 2.4rem;
            border-radius:50px; font-size:1rem;
            font-weight:700; cursor:pointer;
            font-family:sans-serif;
            box-shadow: 0 6px 24px rgba(0,0,0,0.25);
            transition: transform 0.15s, box-shadow 0.15s;
            text-decoration:none; display:inline-block;
        }
        #login-btn:hover { transform:translateY(-2px); box-shadow:0 10px 32px rgba(0,0,0,0.3); }

        #bg-wash {
            position:absolute; inset:0; z-index:1;
            background: radial-gradient(ellipse at center, #e8824a 0%, #c45e28 60%, #2b1200 100%);
            opacity:0; transition: opacity 1.4s ease;
        }
        #bg-wash.show { opacity:1; }

        .paw-dot {
            position:absolute; border-radius:50%;
            background:rgba(255,200,130,0.12);
            animation: pulse-dot 3s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%,100%{opacity:0.12} 50%{opacity:0.22}
        }
    </style>
</head>
<body>
<div id="screen">
    <div id="bg-wash"></div>

    <div class="paw-dot" style="width:180px;height:180px;top:10%;left:5%;animation-delay:0s"></div>
    <div class="paw-dot" style="width:120px;height:120px;bottom:15%;right:8%;animation-delay:1s"></div>
    <div class="paw-dot" style="width:80px;height:80px;top:60%;left:12%;animation-delay:0.5s"></div>

    <div id="intro">
        <div id="paw-label">🐾 petcare</div>
        <svg id="cat-svg" width="160" height="170" viewBox="0 0 160 170">
            <ellipse cx="80" cy="158" rx="42" ry="8" fill="rgba(0,0,0,0.25)"/>
            <polygon points="36,56 22,20 54,40" fill="#c97830"/>
            <polygon points="124,56 138,20 106,40" fill="#c97830"/>
            <polygon points="38,54 27,26 52,42" fill="#f5b070"/>
            <polygon points="122,54 133,26 108,42" fill="#f5b070"/>
            <ellipse cx="80" cy="118" rx="42" ry="34" fill="#e8924a"/>
            <circle cx="80" cy="64" r="38" fill="#e8924a"/>
            <path d="M72,28 Q80,22 88,28 Q84,36 80,38 Q76,36 72,28Z" fill="#d4803a" opacity="0.4"/>
            <ellipse cx="52" cy="72" rx="14" ry="10" fill="#f0a060" opacity="0.4"/>
            <ellipse cx="108" cy="72" rx="14" ry="10" fill="#f0a060" opacity="0.4"/>
            <ellipse cx="80" cy="74" rx="18" ry="13" fill="#f5c080" opacity="0.5"/>
            <g id="eye-l">
                <ellipse cx="62" cy="62" rx="9" ry="10" fill="#1a0a00"/>
                <ellipse cx="62" cy="62" rx="7" ry="8" fill="#3a2010"/>
                <circle cx="65" cy="59" r="3" fill="white"/>
                <circle cx="60" cy="58" r="1.2" fill="white" opacity="0.6"/>
                <rect id="blink-bar-l" x="53" y="52" width="18" height="10" rx="4"
                      fill="#e8924a" transform="scaleY(0)" style="transform-origin:53px 52px"/>
            </g>
            <g id="eye-r">
                <ellipse cx="98" cy="62" rx="9" ry="10" fill="#1a0a00"/>
                <ellipse cx="98" cy="62" rx="7" ry="8" fill="#3a2010"/>
                <circle cx="101" cy="59" r="3" fill="white"/>
                <circle cx="96" cy="58" r="1.2" fill="white" opacity="0.6"/>
                <rect id="blink-bar-r" x="89" y="52" width="18" height="10" rx="4"
                      fill="#e8924a" transform="scaleY(0)" style="transform-origin:89px 52px"/>
            </g>
            <polygon points="80,72 76,77 84,77" fill="#c05540"/>
            <ellipse cx="80" cy="77" rx="4" ry="2" fill="#c05540"/>
            <path d="M76,77 Q80,83 84,77" fill="none" stroke="#a04030" stroke-width="1.8" stroke-linecap="round"/>
            <line x1="30" y1="68" x2="60" y2="72" stroke="#fff8f0" stroke-width="1.2" opacity="0.35"/>
            <line x1="28" y1="75" x2="60" y2="75" stroke="#fff8f0" stroke-width="1.2" opacity="0.35"/>
            <line x1="32" y1="82" x2="60" y2="78" stroke="#fff8f0" stroke-width="1.2" opacity="0.35"/>
            <line x1="130" y1="68" x2="100" y2="72" stroke="#fff8f0" stroke-width="1.2" opacity="0.35"/>
            <line x1="132" y1="75" x2="100" y2="75" stroke="#fff8f0" stroke-width="1.2" opacity="0.35"/>
            <line x1="128" y1="82" x2="100" y2="78" stroke="#fff8f0" stroke-width="1.2" opacity="0.35"/>
            <path d="M118,138 Q148,115 140,88" fill="none" stroke="#d4803a" stroke-width="13" stroke-linecap="round"/>
            <path d="M118,138 Q148,115 140,88" fill="none" stroke="#e8924a" stroke-width="8" stroke-linecap="round"/>
            <ellipse cx="56" cy="146" rx="18" ry="10" fill="#d4803a"/>
            <ellipse cx="104" cy="146" rx="18" ry="10" fill="#d4803a"/>
            <ellipse cx="56" cy="144" rx="14" ry="8" fill="#e8924a"/>
            <ellipse cx="104" cy="144" rx="14" ry="8" fill="#e8924a"/>
        </svg>
    </div>

    <div id="welcome">
        <div style="font-size:3rem;margin-bottom:0.5rem;">🐾</div>
        <h1>Selamat Datang</h1>
        <div class="tagline">di PetCare — layanan perawatan hewan peliharaan</div>
        <a href="{{ route('login') }}" id="login-btn">Masuk ke Akun →</a>
    </div>
</div>

<script>
    const blinkL = document.getElementById('blink-bar-l');
    const blinkR = document.getElementById('blink-bar-r');
    const intro  = document.getElementById('intro');
    const bgWash = document.getElementById('bg-wash');
    const welcome= document.getElementById('welcome');

    function blink(duration=120) {
        return new Promise(res => {
            blinkL.style.transition = `transform ${duration}ms ease`;
            blinkR.style.transition = `transform ${duration}ms ease`;
            blinkL.style.transform = 'scaleY(1)';
            blinkR.style.transform = 'scaleY(1)';
            setTimeout(() => {
                blinkL.style.transform = 'scaleY(0)';
                blinkR.style.transform = 'scaleY(0)';
                setTimeout(res, duration);
            }, duration * 1.2);
        });
    }

    async function run() {
        await new Promise(r => setTimeout(r, 800));
        await blink(110);
        await new Promise(r => setTimeout(r, 700));
        await blink(100);
        await new Promise(r => setTimeout(r, 400));
        await blink(90);
        await new Promise(r => setTimeout(r, 300));
        await blink(220);
        await new Promise(r => setTimeout(r, 600));
        intro.classList.add('fadeout');
        bgWash.classList.add('show');
        setTimeout(() => { welcome.classList.add('show'); }, 800);
    }

    run();
</script>
</body>
</html>