var stars = {
    init : () => {
      for (let d of document.getElementsByClassName("pStar")) {
        let all = d.getElementsByClassName("star");
        for (let s of all) {
          s.onmouseover = () => { stars.hover(all, s.dataset.i); };
          s.onclick = () => { stars.click(d.dataset.pid, s.dataset.i); };
        }
      }
    },
  
    hover : (all, rating) => {
      let now = 1;
      for (let s of all) {
        if (now<=rating) { s.classList.remove("blank"); }
        else { s.classList.add("blank"); }
        now++;
      }
    },
    
    click : (pid, rating) => {
      document.getElementById("ninPdt").value = pid;
      document.getElementById("ninStar").value = rating;
      document.getElementById("ninForm").submit();
    }
  };
  window.addEventListener("DOMContentLoaded", stars.init);
  