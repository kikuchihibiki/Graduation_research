document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowUp' || event.key === 'ArrowDown' || event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
      const sound = document.getElementById('sound');
      sound.play();  // 効果音を再生
    }
  });
  
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      const sound = document.getElementById('start');
      sound.play();  // 効果音を再生
    }
  });
  