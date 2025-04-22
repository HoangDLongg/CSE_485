#include<iostream>
using namespace std;

int KT_S(char c) {
	return c - 'A';
}

char S_KT(int n) {
	return 'A' + n;
}

int main(){
	string P,C,K;
	cout << "Nhap plaintext: "; getline(cin, P);
	cout << "Nhap khoa K: "; getline(cin, K);
	
	//ma hoa
	for(int i=0; i<P.size(); i++) {
		int p = KT_S(P[i]);
		int k = KT_S(K[i%K.size()]);
		int c = (p+k)%26;
		C += S_KT(c);
	}
	cout<<"Chuoi ma hoa: "<<C<<endl;
	
	//giai ma
	P="";
	for(int i=0; i<C.size(); i++){
		int c = KT_S(C[i]);
		int k = KT_S(K[i%K.size()]);
		int p = (c-k+26)%26;
		P += S_KT(p);
	}
	cout<<"Chuoi giai ma: "<<P<<endl;
}


