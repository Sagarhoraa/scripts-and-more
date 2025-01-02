#include <stdio.h>
#include <pthread.h>
#include <semaphore.h>
#include <unistd.h>

#define NUM_PHILOSOPHERS 5

// Semaphore for each fork
sem_t forks[NUM_PHILOSOPHERS];

void* philosopher(void* num) {
    int i = *(int*)num;

    while (1) {
        // Philosopher is thinking
        printf("Philosopher %d is thinking.\n", i);
        sleep(1);

        // Philosopher tries to pick up forks
        sem_wait(&forks[i]);
        sem_wait(&forks[(i + 1) % NUM_PHILOSOPHERS]);

        // Philosopher is eating
        printf("Philosopher %d is eating.\n", i);
        sleep(1);

        // Philosopher puts down forks
        sem_post(&forks[i]);
        sem_post(&forks[(i + 1) % NUM_PHILOSOPHERS]);

        // Philosopher is done eating and goes back to thinking
    }
    return NULL;
}

int main() {
    pthread_t philosophers[NUM_PHILOSOPHERS];
    int philosopher_ids[NUM_PHILOSOPHERS];

    // Initialize semaphores for forks
    for (int i = 0; i < NUM_PHILOSOPHERS; i++) {
        sem_init(&forks[i], 0, 1);
        philosopher_ids[i] = i;
    }

    // Create philosopher threads
    for (int i = 0; i < NUM_PHILOSOPHERS; i++) {
        pthread_create(&philosophers[i], NULL, philosopher, &philosopher_ids[i]);
    }

    // Wait for philosopher threads to finish (they actually won't in this example)
    for (int i = 0; i < NUM_PHILOSOPHERS; i++) {
        pthread_join(philosophers[i], NULL);
    }

    return 0;
}
