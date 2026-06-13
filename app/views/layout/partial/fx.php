<style>
.khung { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: 0; }
.content, .navbar, .footer { position: relative; z-index: 1; }
.tam { position: absolute; top: -10%; left: 50%; width: 50px; height: 50px; animation: fall linear infinite; transform-origin: top center; opacity: 0.8; }
.tamhoa { background-color: #D25381; border-radius: 100%; width: 10px; height: 10px; position: relative; margin: 0 auto; }
.tamhoa::before, .tamhoa::after { content: ''; position: absolute; background-color: #FCB1CF; border-radius: 50% 50%; width: 10px; height: 15px; top: -90%; left: 20%; transform-origin: 50% 100%; }
.tamhoa::before { transform: rotate(0); }
.tamhoa::after  { transform: rotate(72deg); }
.tamhoa div::before, .tamhoa::after { content: ''; position: absolute; background-color: #FCB1CF; border-radius: 50% 50%; width: 10px; height: 15px; top: -90%; left: 20%; transform-origin: 50% 100%; }
.tamhoa div:nth-child(1)::before { transform: rotate(144deg); }
.tamhoa div:nth-child(2)::before { transform: rotate(216deg); }
.tamhoa div:nth-child(3)::before { transform: rotate(288deg); }
@keyframes fall { 0% { transform: translateY(0) rotate(0deg); } 100% { transform: translateY(140vh) rotate(280deg); } }
.tamhoa1  { animation-duration: 8s;  animation-delay: 0s;  left: 2%;  }
.tamhoa2  { animation-duration: 10s; animation-delay: 2s;  left: 10%; }
.tamhoa3  { animation-duration: 12s; animation-delay: 4s;  left: 18%; }
.tamhoa4  { animation-duration: 9s;  animation-delay: 1s;  left: 26%; }
.tamhoa5  { animation-duration: 7s;  animation-delay: 3s;  left: 34%; }
.tamhoa6  { animation-duration: 11s; animation-delay: 0s;  left: 42%; }
.tamhoa7  { animation-duration: 10s; animation-delay: 5s;  left: 50%; }
.tamhoa8  { animation-duration: 9s;  animation-delay: 2s;  left: 58%; }
.tamhoa9  { animation-duration: 11s; animation-delay: 4s;  left: 65%; }
.tamhoa10 { animation-duration: 12s; animation-delay: 1s;  left: 72%; }
.tamhoa11 { animation-duration: 8s;  animation-delay: 3s;  left: 79%; }
.tamhoa12 { animation-duration: 10s; animation-delay: 0s;  left: 86%; }
.tamhoa13 { animation-duration: 9s;  animation-delay: 5s;  left: 92%; }
.tamhoa14 { animation-duration: 11s; animation-delay: 2s;  left: 97%; }
.tamhoa15 { animation-duration: 7s;  animation-delay: 6s;  left: 6%;  }
.tamhoa16 { animation-duration: 13s; animation-delay: 3s;  left: 46%; }
.tamhoa17 { animation-duration: 8s;  animation-delay: 7s;  left: 63%; }
.tamhoa18 { animation-duration: 11s; animation-delay: 1s;  left: 88%; }
</style>
<div class="khung">
    <?php for ($i = 1; $i <= 18; $i++): ?>
    <div class="tam tamhoa<?php echo $i; ?>">
        <div class="tamhoa"><div></div><div></div><div></div></div>
    </div>
    <?php endfor; ?>
</div>
