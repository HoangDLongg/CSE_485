//Lap trinh nhap mot chuoi ki tu tu ban phim, 
//ma hoa chuoi bang thuat toan Affine voi cap so {a, b} nhap tu ban phim
//Hien chuoi moi ra mh
//Nhap lai neu a k tm dk
#include<iostream>
using namespace std;
int KT_S(char c){
	return c - 'A';
}
char S_KT(int n){
	return 'A' + n;
}
int main(){
	string P, C;
	int a, b;
	cout<<"Nhap chuoi plaintext: "; getline(cin, P);
	do {
		cout << "a = "; cin >> a;
	} while(a % 2 == 0 || a == 13);
	cout<<"b = "; cin>>b;
	//Ma hoa
	for(int i = 0; i < P.size(); i++){
		int p = KT_S(P[i]);
		int c = (a * p + b) % 26;
		C += S_KT(c);
	}
	cout<<"Chuoi ma hoa: "<<C;
	//Giai ma
	P="";
	int a1;
	for(int i = 1; i < 26; i++){
	if((a * i) % 26 == 1){
		a1 = i;
		break;
		}
	}
	for(int i = 0; i < C.size(); i++){
		int c = KT_S(C[i]);
		int p = a1 * (c - b + 26) % 26;
		P += S_KT(p);
	}
	cout<<endl<<"Chuoi giai ma: "<<P;
}
