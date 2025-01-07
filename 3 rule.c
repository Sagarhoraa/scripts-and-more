#include <stdio.h>

float f(float x) {
    // Function to integrate
    return x * x; // Example: f(x) = x^2
}

float simpson(float a, float b, int n) {
    float h = (b - a) / n;
    float integral = f(a) + f(b);

    for (int i = 1; i < n; i++) {
        float x = a + i * h;
        integral += (i % 2 == 0) ? 2 * f(x) : 4 * f(x);
    }

    return integral * h / 3.0f;
}

int main() {
    float a = 0;  // Lower limit
    float b = 1;  // Upper limit
    int n = 6;    // Number of subintervals (must be even)

    float result = simpson(a, b, n);
    printf("Result of integration: %f\n", result);

    return 0;
}
