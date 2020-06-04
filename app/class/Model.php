<?php


class Model
{
    public static function getInvertedPendulum($r, $position) {
        return "
            M = .5;
            m = 0.2;
            b = 0.1;
            I = 0.006;
            g = 9.8;
            l = 0.3;
            p = I*(M+m)+M*m*l^2;
            A = [0 1 0 0; 0 -(I+m*l^2)*b/p (m^2*g*l^2)/p 0; 0 0 0 1; 0 -(m*l*b)/p m*g*l*(M+m)/p 0];
            B = [ 0; (I+m*l^2)/p; 0; m*l/p];
            C = [1 0 0 0; 0 0 1 0];
            D = [0; 0];
            K = lqr(A,B,C'*C,1);
            Ac = [(A-B*K)];
            N = -inv(C(1,:)*inv(A-B*K)*B);
            
            sys = ss(Ac,B*N,C,D);
           
            t = 0:0.05:10;
            r=" . (float)$r ."
            [y,t,x]=lsim(sys,r*ones(size(t)),t," . $position .");
            disp(x(:,1));
            disp('------');
            disp(x(:,3));
            disp('------');
            disp(x(size(x,1),1));
            disp(x(size(x,1),2));
            disp(x(size(x,1),3));
            disp(x(size(x,1),4));
        ";
    }

    public static function getBallBeam($r, $position) {
        return "
            m = 0.111;
            R = 0.015;
            g = -9.8;
            J = 9.99e-6;
            H = -m*g/(J/(R^2)+m);
            A = [0 1 0 0; 0 0 H 0; 0 0 0 1; 0 0 0 0];
            B = [0;0;0;1];
            C = [1 0 0 0];
            D = [0];
            K = place(A,B,[-2+2i,-2-2i,-20,-80]);
            N = -inv(C*inv(A-B*K)*B);
                
            sys = ss(A-B*K,B,C,D);
                
            t = 0:0.01:5;
            r = {$r};
            [y,t,x]=lsim(N*sys,r*ones(size(t)),t,{$position});
            disp(N*x(:,1));
            disp('------');
            disp(x(:,3));
            disp('------');
            disp(x(size(x,1),1));
            disp(x(size(x,1),2));
            disp(x(size(x,1),3));
            disp(x(size(x,1),4));
        ";
    }

    public static function getAircraftPitch($r, $position) {
        return "
                A = [-0.313 56.7 0; -0.0139 -0.426 0; 0 56.7 0];
                B = [0.232; 0.0203; 0];
                C = [0 0 1];
                D = [0];
                
                p = 2;
                K = lqr(A,B,p*C'*C,1);
                N = -inv(C(1,:)*inv(A-B*K)*B);
                
                sys = ss(A-B*K, B*N, C, D);
                
                t = 0:0.1:40;
                r = {$r};
                initAlfa=0;
                initQ=0;
                initTheta=0;
                [y,t,x]=lsim(sys,r*ones(size(t)),t,{$position});
                disp(x(:,3));
                disp('------');
                disp(r*ones(size(t))*N-x*K');
                disp('------');
                disp(x(size(x,1),1));
                disp(x(size(x,1),2));
                disp(x(size(x,1),3));
        ";
    }

    public static function getCarSuspension($r, $position) {
        return "
            m1 = 2500; m2 = 320;
            k1 = 80000; k2 = 500000;
            b1 = 350; b2 = 15020;
            A=[0 1 0 0;-(b1*b2)/(m1*m2) 0 ((b1/m1)*((b1/m1)+(b1/m2)+(b2/m2)))-(k1/m1) -(b1/m1);b2/m2 0 -((b1/m1)+(b1/m2)+(b2/m2)) 1;k2/m2 0 -((k1/m1)+(k1/m2)+(k2/m2)) 0];
            B=[0 0;1/m1 (b1*b2)/(m1*m2);0 -(b2/m2);(1/m1)+(1/m2) -(k2/m2)];
            C=[0 0 1 0]; D=[0 0];
            Aa = [[A,[0 0 0 0]'];[C, 0]];
            Ba = [B;[0 0]];
            Ca = [C,0]; Da = D;
            K = [0 2.3e6 5e8 0 8e6];
            sys = ss(Aa-Ba(:,1)*K,Ba,Ca,Da);
            
            t = 0:0.01:5;
            r ={$r};
            
            [y,t,x]=lsim(sys*[0;1],r*ones(size(t)),t,{$position});
            disp(x(:,1));
            disp('------');
            disp(x(:,3));
            disp('------');
            disp(x(size(x,1),1));
            disp(x(size(x,1),2));
            disp(x(size(x,1),3));
            disp(x(size(x,1),4));
        ";
    }
}