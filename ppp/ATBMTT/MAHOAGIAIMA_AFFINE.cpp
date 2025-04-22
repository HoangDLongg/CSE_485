#include<iostream>
using namespace std;

int KT_S(char c) {
	return c - 'A';
}

char S_KT(int n) {
	return 'A' + n;
}

int main() {
	string P,C;
	int a,b;
	cout<<"Nhap chuoi plaintext: "; getline(cin,P);
	while(a%2==0 || a==13){
		cout<<"Nhap a="; cin>>a;
	}
	cout<<"Nhap b="; cin>>b;
	 
	//ma hoa
	for(int i=0; i<P.size(); i++) {
		int p=KT_S(P[i]);
		int c=(a*p+b)%26;
		C+=S_KT(c);
	}
	cout<<"Chuoi ma hoa: "<<C<<endl;
	
	//giai ma
	P="";
	int a1;
	for(int i=1; i<=25; i++) {
		if((i*a) % 26 == 1){
			a1=i; break;
		}
	}
	for(int i=0; i<C.size(); i++){
		int c=KT_S(C[i]);
		int p=a1*(c-b+26)%26;
		P+=S_KT(p);
	}
	cout<<"Chuoi giai ma: "<<P<<endl;
	return 0;
}

