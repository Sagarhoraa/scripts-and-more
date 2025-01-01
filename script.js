
    // Initialize the countdown value
    let countdownValue = 30;

    // Function to update the timer
    const updateTimer = () => {
      const timerElement = document.getElementById('timer');
      timerElement.textContent = countdownValue;

      // Check if the countdown has reached 0
      if (countdownValue === 0) {
        clearInterval(timerInterval);
        timerElement.textContent = "Time's up";
      } else {
        countdownValue--;
      }
    };

    // Set an interval to update the timer every second
    const timerInterval = setInterval(updateTimer, 1000);
