//Lap trinh nhap mot chuoi ki tu tu ban phim, ma hoa chuoi bang thuat toan CAESAR tong quat
//voi khoa K nhap tu ban phim. Hien chuoi moi ra mh.
//Lap trinh giai ma de khoi phuc lai chuoi ban dau.
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
	int k;
	//Ma hoa
	cout<<"Nhap chuoi Plain text: "; getline(cin, P);
	cout<<"Nhap khoa K: "; cin>>k;
	for(int i = 0; i < P.size(); i++){
		int p = KT_S(P[i]);
		int c = (p + k) % 26;
		C += S_KT(c);
	}
	cout<<"Chuoi ma hoa la: "<< C;
	
	//Giai ma
	P = "";
	for(int i = 0; i < C.size(); i++){
		int c = KT_S(C[i]);
		int p = (c - k + 26) % 26;
		P += S_KT(p);
	}
	cout<<endl<<"Chuoi giai ma la: "<<P;
	
}
