#include<stdio.h>
#include<math.h>
#include<conio.h>

float function(float x){
    float y;
    y = 3*(x)*(x)+2*(x)-5;
    return y;
}
int main(){
    int n;
    int i;
    float a,b,h,sum,integral;
    printf("\n Enter lower limit: ");
    scanf("%f",&a);
    printf("Enter upper limit: ");
    scanf("%f",&b);
    printf("\n Enter the number of interval :");
    scanf("%d",&n);

    h=(b-a)/n;
    sum= function(a) + function(b);
    i=2;
  while (i<=2)
  {
    sum= sum+2*function(a+(i-1)*h);
    i++;
  }
  integral = h*sum/2;
  printf("\n Answer is = %f",integral);
  getch();

}

