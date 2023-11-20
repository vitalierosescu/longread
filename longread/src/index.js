import './style.css';

{
  // VARIABLES
  // --- boss ---
  const $boss = document.querySelector('.boss');
  const $bossContact = document.querySelector('.boss_contact');
  const $bossImgContainer = document.querySelector('.boss_img-container');
  const $bossInfo = document.querySelector('.boss_info');
  const $bossImg = document.querySelector('.boss_img');
  const $bossMessage = document.querySelector('.boss_message');
  const $bossMessageImg = document.querySelector('.boss_message-img');
  const $bossClock = document.querySelector('.boss_clock');
  const $bossAnswers = document.querySelector('.boss_answers');
  const $bossContainer = document.querySelector('.boss_container');
  const $bossContinue = document.querySelector('.boss_continue');

  const $bossBelow = document.querySelector('.boss_below');



  function startTime() {
    let today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    m = checkTime(m);
    document.querySelector(`.boss_clock-time`).textContent = `${h} : ${m}`;
    let t = setTimeout(startTime, 500);
  }

  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }

  const $marsBtn = document.querySelector('.btn-mars');
  const $marsLeave = document.querySelector('.mars-leave');
  const $marsInfected = document.querySelector('.mars-infected');

  // phone call buttons with boss
  const $acceptBtn = document.querySelector('.btn-accept');
  const $acceptBtnDiv = document.querySelector('.boss_action');
  const $optionBtn1 = document.querySelector('.boss_answer1');
  const $optionBtn2 = document.querySelector('.boss_answer2');

  const disappearMars = () => {
    // $marsLeave.classList.add(`mars-disappear`);
    $marsLeave.style.display = `none`;
    $marsInfected.style.display = `flex`;
  };

  const handleClickAccept = () => {
    $boss.classList.add(`boss-clicked`);
    $acceptBtnDiv.classList.add(`hidden`);
    // boss contact
    $bossContact.classList.add(`boss_contact-clicked`);
    // boss info
    $bossInfo.classList.remove(`hidden`);
    // boss img container
    $bossImgContainer.classList.add(`boss_img-container-clicked`);
    // img
    $bossImg.classList.add(`boss_img-clicked`);
    // message
    $bossMessage.classList.remove(`hidden`);
    // clock
    $bossClock.classList.remove(`hidden`);
    // answers
    $bossAnswers.classList.remove(`hidden`);
    // adding boss glow
    $bossContainer.classList.add(`boss_glow`);
    // adding boss glow
    $bossMessageImg.classList.remove(`hidden`);
  };

  const handleClickOption1 = () => {
    $bossMessage.textContent =
    `Ze zijn de nieuwste, intelligenste en meest geavanceerde android modellen op de markt! Ze zien er misschien uit als mensen maar van binnen zijn het slechts circuits en draden. Er lopen er nu 6 vrij rond en het is aan jou om ze uit te schakelen.  Nu, genoeg met praten. Neem je hovercar en haast je naar het politie bureau.`;

    $optionBtn1.classList.add(`hidden`);
    $optionBtn2.classList.add(`hidden`);
    $bossBelow.classList.remove(`hidden`);
    $bossContinue.classList.remove(`hidden`);

  }

  const handleClickOption2 = () => {
    $bossMessage.textContent =
    `Je durft wel nog hé! Ik geef je de kans van je leven en jij vraagt voor een prijsje. 1000 €. Dat staat er op het spel. Meer dan genoeg om eindelijk geen klein gastje meer te zijn in ons politiegebouw. Wie weet zal je wel eindelijk dat schaap van je kunnen kopen, als we er vanuit gaan dat je ze vangt natuurlijk...`;

    $optionBtn1.classList.add(`hidden`);
    $optionBtn2.classList.add(`hidden`);
    $bossBelow.classList.remove(`hidden`);
    $bossContinue.classList.remove(`hidden`);
  }

  // SCROLLING PROGRESS BAR
  const bar = document.querySelector('.progress-bar');

  const scrollProgress = () => {
    let vheight = document.body.offsetHeight - window.innerHeight;
    let barWidth = (window.pageYOffset * 100 / vheight)
    bar.style.height = barWidth + '%'
  }

  window.addEventListener(`scroll`, scrollProgress);


  // HOVER CAR SCROLL EFFECT
//   var test = document.querySelector(".test");

//   const $ride = document.querySelector(`.ride`);
//   const Scroll = () => {
//   let ypos = $ride.scrollTop;
//   console.log(ypos);

//     if (ypos > 200) {
//       test.style = `font-size: ${1*1.1}`
//     }
//   }

// $ride.addEventListener("scroll", Scroll);

  const init = () => {
    $marsBtn.addEventListener('click', disappearMars);
    $acceptBtn.addEventListener('click', handleClickAccept);
    $optionBtn1.addEventListener('click', handleClickOption1);
    $optionBtn2.addEventListener('click', handleClickOption2);
    startTime();
  };

  init();
}
